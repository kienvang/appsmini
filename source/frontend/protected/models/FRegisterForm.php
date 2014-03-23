<?php

class FRegisterForm extends CFormModel {
    // Sent email & save log + refer from cookie

    public $username;
    public $email;
    public $password;
    public $retype_password;
    public $captcha;
    public $policy=1;
    public $confirm_account;
    public $from='tethien.vn';
    public $user;
    public $email_register;

    public function rules()
    {
        return array(
            array('username,email,password,retype_password,policy','required'),
            array('email','email'),
            array('email','length','max'=>100),
            array('username','length','max'=>32,'min'=>6),
            array(
                'username',
                'match',
                'not'=>true,
                'pattern'=>'/[^0-9a-zA-Z_]/',
                'message'=>'Tên đăng nhập không được chứa kí tự đặc biệt',
            ),
            array('password,retype_password','length','max'=>32,'min'=>6),
            array('retype_password','compare','compareAttribute'=>'password','message'=>'Mật khẩu xác nhận phải giống mật khẩu'),
            array('policy','required','requiredValue'=>'1','message'=>'Bạn chưa chấp nhận điều khoản và điều kiện'),
            array('captcha','required'),
            array('captcha','captcha','captchaAction'=>'//site/captcha','allowEmpty'=>CCaptcha::checkRequirements(),'message' => 'Mã xác nhận không đúng'),
            array('username','validateUser'),
            array('username,email,password,retype_password,captcha,policy','safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'username'          => 'Tài khoản',
            'password'          => 'Mật khẩu',
            'retype_password'   => 'Xác nhận mật khẩu',
            'email'             => 'Email',
            'captcha'           => 'Mã xác nhận',
        );
    }

    public function validateUser()
    {
        $model = SystemUser::model()->findByAttributes(array('username'=>$this->username));
        if($model!==null) {
            $this->addError('username', 'Tài khoản này đã tồn tại.');
            //return false;
        }
    }

    public function sendEmail()
    {
        $email_body = SystemTemplate::model()->findByAttributes(array('code'=>$this->email_register))->template;

        $email_str = '{email}';
        $username_str = '{username}';
        $password_str = '{password}';
        $linkActive = '{link_active}';

        $email_body=str_replace($email_str,$this->email,$email_body);

        $email_body=str_replace($username_str,$this->username,$email_body);

        $email_body=str_replace($password_str,$this->password,$email_body);

        $email_body=str_replace($linkActive,$this->user->activationUrl,$email_body);

        $mail = array(
            'to' => $this->email,
            'subject' => 'Tề Thiên - Tethien.vn Chúc mừng bạn đăng ký thành công',
            'body' => $email_body,
        );

        return Mailer::send($mail);
    }

    public function validateFromApi() {
        $token = FLoginForm::getAccessToken();
        $return = Func::model()->Register($token,$this, $this->confirm_account);

        if(isset($return) && isset($return->error)){
            foreach ($return->error as $key =>  $item) {
                $this->addError($key, $item[0]);
            }
            return false;
        }

        if(isset($return) && isset($return->id)) {
            $this->user = $return;
            return true;
        }
    }

    public function register() {
        $login = new FLoginForm();
        $login->username = $this->username;
        $login->password = $this->password;
        $new_user = $login->saveNewAccount($this->username, $this->user->id, 1);

        if(!$this->confirm_account) {
            $identity = new UserIdentity($this->username,$this->password);
            $identity->user = $new_user;
            $identity->authenticate();
            Yii::app()->user->login($identity,0);
            $login->saveCookieSSO();
        }
        $refer_url = Util::getCookie(FLoginForm::COOKIE_HTTP_REFER);
        $from_url  = Util::getCookie(FLoginForm::COOKIE_HTTP_RAW);
        RegisterLog::save_log($refer_url, $from_url);
    }
}