<?php

class SiteController extends Controller
{

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,

			),
			'page' => array(
					'class' => 'CViewAction',
			),
		);
	}


	public function actionIndex()
	{
        $this->render('index');
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	public function actionLogin($redirect_url = '')
	{
        $this->layout = '//layouts/server';

        if(!Yii::app()->user->isGuest) {
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo json_encode(array('status' => true, 'login' => true));
                Yii::app()->end();
            }
            $this->redirect(!empty($redirect_url) ? $redirect_url : Yii::app()->user->returnUrl);
        }

        $status = false;
		$model = new FLoginForm;
        $this->performAjaxValidation($model, 'login-form');
		if(isset($_POST['FLoginForm']))
		{
			$model->attributes = $_POST['FLoginForm'];
			if($model->validate()) {
                $user = $model->authenticateFromIdLike();
                if ($user instanceof SystemUser) {
                    if($model->login($user, false, $model->check_activate)) {
                        $cookie_setting = SystemSetting::model()->getCookieKey();
                        $refer_url = Util::getCookie(FLoginForm::COOKIE_HTTP_REFER, $cookie_setting);
                        $from_url  = Util::getCookie(FLoginForm::COOKIE_HTTP_RAW, $cookie_setting);
                        if(empty($from_url))
                            $from_url = Yii::app()->request->getUrl();
                        LoginLog::save_login($refer_url, $from_url);
                        SystemLoginAttempt::model()->deleteAll('username = :username', array('username' => $user->username));
                        $model->saveCookieSSO();
                        $status = true;
                    }
                }
            }
		}

        if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            if($status == true) {
                echo json_encode(array('status' => true, 'user_id' => Yii::app()->user->id));
            }
            else {
                echo json_encode(array('status' => true, 'error' => $model->errors));
            }
            Yii::app()->end();
        }

        if($status == true) {
            $this->redirect(!empty($redirect_url) ? $redirect_url : Yii::app()->user->returnUrl);
        }
        $this->render('login',array('model'=>$model));

	}

	public function actionLogout($redirect_url = '')
	{
        if(empty($redirect_url))
            $redirect_url = Yii::app()->user->returnUrl;

        //Clear cookie login
        Util::clearCookie(FLoginForm::COOKIE_LOGIN);
        Util::clearCookie('token');
        Util::clearCookie('token_data');
		Yii::app()->user->logout();

        $array = explode("auth_token=", $redirect_url);

        $this->redirect($array[0]);
	}

    public function actionRegister() {

        $this->layout = '//layouts/server';

        if(!Yii::app()->user->isGuest)
            $this->redirect('/play');

        $success=false;
        $setting_confirm = json_decode(SystemSetting::model()->getValue('confirm_register'),true);
        $model = new FRegisterForm();
        $model->confirm_account = $setting_confirm['confirm'];
        $beta = Yii::app()->getModule('server')->is_beta;
        if($beta)
            $model->email_register = $setting_confirm['emailCBT'];
        else
        {
            if($model->confirm_account == 0)
                $model->email_register = $setting_confirm['emailOBT'];
            else
                $model->email_register = $setting_confirm['confirm_email'];
        }

        //$this->performAjaxValidation($model, 'register-form');

        if(isset($_POST['FRegisterForm']))
        {
            $model->attributes=$_POST['FRegisterForm'];
            if($model->validate())
            {
                if($model->validateFromApi()) {
                    $model->register();

                    //Tracking Facebook & Google
                    $cookie_setting = SystemSetting::model()->getCookieKey();
                    Util::writeCookie(array('name' => 'script_register', 'value' => 'regis', 'valueDefault' => 'regis'), $cookie_setting);

                    $model->sendEmail();

                    $success=true;
                }
            }
        }

        if(isset($_POST['ajax']) && $_POST['ajax'] === 'register-form')
        {
            if($success == true)
            {
                if($model->confirm_account == 0)
                    echo json_encode(array('confirm'=>false,'message'=>'Chúc mừng bạn đã đăng kí thành công'));
                else
                    echo json_encode(array('confirm'=>true,'message'=>'Chúc mừng bạn đã đăng kí thành công, vui lòng kiểm tra email xác nhận tài khoản'));
            }
            else {
                echo json_encode(array('status' => true, 'error' => $model->errors));
            }
            Yii::app()->end();
        }

        $this->render('register',array('model'=>$model));
    }

    public function performAjaxValidation($model, $form)
    {
        if(isset($_POST['ajax']) && $_POST['ajax'] === $form)
        {
            return CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}