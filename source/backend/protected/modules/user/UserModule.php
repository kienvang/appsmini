<?php

class UserModule extends CWebModule
{
    public $passwordRequirements = array(
        'minLen' => 4,
        'maxLen' => 32,
        'minLowerCase' => 0,
        'minUpperCase'=>0,
        'minDigits' => 0,
        'maxRepetition' => 3,
    );

    public $usernameRequirements=array(
        'minLen'=>3,
        'maxLen'=>32,
        'match' => '/^[A-Za-z0-9_]+$/u',
        'dontMatchMessage' => 'Incorrect symbol\'s. (A-z0-9)',
    );

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
