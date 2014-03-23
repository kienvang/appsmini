<?php

class UserIdentity extends CUserIdentity {

    private $id;
    public $user;

    const ERROR_NONE = 0;

    const ERROR_USERNAME_INVALID=1;
    const ERROR_PASSWORD_INVALID=2;
    const ERROR_EMAIL_INVALID=3;

    const ERROR_STATUS_INACTIVE=4;
    const ERROR_STATUS_BANNED=5;
    const ERROR_STATUS_REMOVED=6;
    const ERROR_STATUS_USER_DOES_NOT_EXIST=7;
    const ERROR_USERNAME_OR_PASSWORD_INVALID=8;

    public function authenticate()
    {
        $user = SystemUser::model()->find('username = :username', array(':username' => $this->username));
        if(!$user)
            $this->errorCode = self::ERROR_STATUS_USER_DOES_NOT_EXIST;
        else{
            if(!$user->verifyPassword($this->password)){
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
            else if (preg_match ( "/[^-a-z0-9_.‚ô•√ü‚Ä†‚ô¶@-]/i", $this->username )) {
                /**[^-a-z0-9_.‚ô•√ü‚Ä†‚ô¶@-]**/
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }
            else if($user->status == SystemUser::STATUS_INACTIVE)
                $this->errorCode= self::ERROR_STATUS_INACTIVE;
            else if($user->status == SystemUser::STATUS_BANNED)
                $this->errorCode=self::ERROR_STATUS_BANNED;
            else if($user->status == SystemUser::STATUS_REMOVED)
                $this->errorCode=self::ERROR_STATUS_REMOVED;
            else {
                $this->id = $user->id;
                $this->setState('id', $user->id);
                $this->setState('username', $user->username);

                $this->username = $user->username;
                $this->errorCode=self::ERROR_NONE;

                //Update lastvisit
                $user->lastvisit = time();
                $user->save(true, array('lastvisit'));
            }
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
