<?php

Yii::import('backend.modules.user.forms.LoginForm');
Yii::import('backend.modules.user.models.SystemUser');
Yii::import('backend.modules.user.models.SystemLoginAttempt');
Yii::import('backend.modules.user.components.UserIdentity');
Yii::import('backend.modules.user.components.Func');

class FLoginForm extends LoginForm {

    const COOKIE_LOGIN          = 'LOGIN';
    const COOKIE_HTTP_REFER     = 'HTTP_REFER';
    const COOKIE_HTTP_RAW       = 'HTTP_RAW';

    public $check_activate = true;

    public function attributeLabels()
    {
        return array(
            'username' => 'Tài khoản',
            'password' => 'Mật khẩu'
        );
    }

    public function authenticateFromIdLike() {

        //Check login attempt
        $attempt = new SystemLoginAttempt();
        $count_login_attempt = $attempt->countLoginAttempts($this->username, Yii::app()->getModule('user')->login_attempt['time']);
        if($count_login_attempt >= Yii::app()->getModule('user')->login_attempt['quantity']) {
            $oldest = $attempt->getOldestAttemptDate($this->username, Yii::app()->getModule('user')->login_attempt['time']);
            $time_remaining      = Yii::app()->getModule('user')->login_attempt['time'] - (time() - $oldest->attempt_date);
            $this->addError('password','Bạn đã nhập sai mật khẩu quá '. Yii::app()->getModule('user')->login_attempt['quantity'] . ' lần. Vui lòng quay lại sau ' . round($time_remaining/60) . ' phút.');
            return false;
        }
        SystemLoginAttempt::saveOne($this->username);

        $token       = self::getAccessToken();
        $login = null;
        if(empty($token)){
            $this->addError('password','Lỗi xác thực token.');
            return false;
        }

        $login = Func::model()->Login($token, $this->username, $this->password);
        if(isset($login->error)) {
            if(isset($login->error->username))
                $this->addError('username',$login->error->username[0]);
            elseif(isset($login->error->password))
                $this->addError('password',$login->error->password[0]);
            return false;
        }

        if(empty($login->id) || empty($login->username)){
            $this->addError('password','Tên đăng nhập hoặc mật khẩu không đúng.');
            return false;
        }

        $newuser = SystemUser::model()->find('username = :username', array(':username' => $this->username));
        if(!isset($newuser)) {
            $newuser = $this->saveNewAccount($login->username, $login->id, $login->status);
        }
        else {
            if (isset($login->createtime) && isset($login->day_activate)){
                $t = strtotime($login->day_activate, $login->createtime);
                if (time() < $t) $this->check_activate = false;
                if($login->status != SystemUser::STATUS_ACTIVE && time() > $t) {
                    $this->addError('password','Tài khoản của bạn đã bị khóa.');
                    return false;
                }
            }else{
                if($login->status != SystemUser::STATUS_ACTIVE) {
                    $this->addError('password','Tài khoản của bạn đã bị khóa.');
                    return false;
                }
            }

            $newuser->lastvisit     = time();
            $newuser->status        = $login->status;
            $newuser->update();
        }

        return $newuser;
    }


    public function saveCookieSSO($key = null) {
        if(!$key)
            $key = SystemSetting::model()->getCookieKey();
        $data = array(
            'name'          => self::COOKIE_LOGIN,
            'value'         => $this->username.'_'.time().'_'.$_SERVER['HTTP_HOST'],
            'valueDefault'  => true
        );
        Util::writeCookie($data, $key);
    }


    public static function getAccessToken()
    {
        $sso_setting = json_decode(SystemSetting::model()->getValue('sso'));
        $token = Func::model()->getToken($sso_setting->client_id, $sso_setting->client_secret);
        $token = json_decode($token);
        return $token->access_token;
    }

}