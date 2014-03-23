<?php
class RequireLogin extends CBehavior
{
	public function attach($owner)
	{
		$owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
	}

	public function handleBeginRequest($event)
	{
        $request = Yii::app()->request;
        $refer_url = parse_url($request->getUrlReferrer());
        $current_url = parse_url($request->getUrl());

        if ($refer_url['path'] != $current_url['path']
            && $refer_url['path'] != Yii::app()->createUrl('user/auth/login')
            && $refer_url['path'] != Yii::app()->createUrl('/')
        ){
            $data = array(
                'value'             => $refer_url['path'],
                'valueDefault'      => $refer_url['path'],
                'name'              => 'refer'
            );
            Util::writeCookie($data);
        }

        $app = Yii::app();
		$user = $app->user;

		$request = trim($app->urlManager->parseUrl($app->request), '/');
		$login = trim($user->loginUrl[0], '/');

		// Restrict guests to public pages.
		$allowed = array($login, 'user/auth/login');
		if ($user->isGuest && !in_array($request, $allowed))
			$user->loginRequired();

        /*
		if(!$user->isAdmin() && !in_array($request, $allowed)){
    		$app->request->redirect(Yii::app()->homeUrl);
		}
        */
		
		// Prevent logged in users from viewing the login page.
		$request = substr($request, 0, strlen($login));
		if (!$user->isGuest && $request == $login)
		{
			$url = $app->createUrl($app->homeUrl[0]);
			$app->request->redirect($url);
		}
	}
}