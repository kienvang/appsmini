<?php

class AuthController extends Controller
{
    public function actionLogin()
    {
        $this->layout = '//layouts/login';

        $model=new LoginForm();

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login()) {
                $cookie = Util::getCookie('refer');
                //ActionLog::addAction(ActionLog::LOG_LOGIN, "", $cookie);

                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function  actionProfile(){
        $model = SystemUser::model()->findByPk(Yii::app()->user->id);
        $passwordForm = new ChangePasswordForm();
        $passwordForm->setScenario('check_pass');
        $employee = ($model->profile) ? $model->profile : new ShopEmployee();
        $error = false;
        if (isset($_POST['ShopEmployee'])){
            $employee->attributes = $_POST['ShopEmployee'];
            $employee->id = $model->id;
            if ($employee->validate()){
                if (isset($_POST['ChangePasswordForm']) && !empty($_POST['ChangePasswordForm']['password']) && !empty($_POST['ChangePasswordForm']['currentPassword'])){
                    $passwordForm->attributes = $_POST['ChangePasswordForm'];
                    $passwordForm->user = $model;
                    if ($passwordForm->validate()){
                        $model->setPassword($_POST['ChangePasswordForm']['password']);
                    }else{
                        $error = true;
                    }
                }

                if (!$error){

                    $employee->save();
                    $model->save();
                    $this->redirect(array('/'));
                }
            }

        }

        $this->render('edit_profile', array(
            'model' => $model,
            'passwordForm' => $passwordForm,
            'employee' => $employee
        ));
    }
}