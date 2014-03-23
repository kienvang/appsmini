<?php

class ChangePasswordForm extends CFormModel
{
    public $password;
    public $verifyPassword;
    public $currentPassword;
    public $username;
    public $superuser;
    public $status;

    /**
     * @var SystemUser
     */
    public $user;

    public function rules() {
        $passwordRequirements = Yii::app()->getModule('user')->passwordRequirements;
        $passwordrule = array_merge(array('password', 'PasswordValidator'), $passwordRequirements);
        $rules[] = $passwordrule;
        $rules[] = array('currentPassword, verifyPassword, password', 'safe');
        $rules[] = array('currentPassword', 'checkPassword', 'on' => 'check_pass');
        //$rules[] = array('password, verifyPassword', 'required');
        $rules[] = array('password', 'compare', 'compareAttribute' =>'verifyPassword', 'message' => 'Mật khẩu không khớp.');

        return $rules;
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'password'=>'Mật khẩu',
            'verifyPassword'=>'Nhập lại mật khẩu',
            'currentPassword'=>'Mật khẩu hiện tại',
        );
    }

    public function checkPassword($field){
        if (!empty($this->currentPassword)){
            if (!$this->user->verifyPassword($this->currentPassword)){
                $this->addError($field, 'Mật khẩu không đúng.');
                return false;
            }
        }
    }
}
