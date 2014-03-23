<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    function checkToken($token, $token_data){
        $key = "tethien2014#home";
        if (md5($key.$token_data) == $token) return true;
        return false;
    }

    public function init()
    {
        $request = trim( Yii::app()->urlManager->parseUrl( Yii::app()->request), '/');
        $not_allow = array(
            'site/login',
            'site/logout',
            'site/register',
            'site/captcha',
        );
        if(!in_array($request, $not_allow)) {
            Yii::app()->user->setReturnUrl(Yii::app()->request->getUrl());
        }

        /*
        $this->meta_description     = SystemSetting::model()->getDescription();
        $this->meta_keywords        = SystemSetting::model()->getKeywords();
        $this->meta_title           = SystemSetting::model()->getTitle();
        */

        /*
        if(Yii::app()->getModule('server')->is_beta == true) {
            $request = trim( Yii::app()->urlManager->parseUrl( Yii::app()->request), '/');
            $token = "";
            $token_data = "";
            if (isset($_REQUEST['token'])){
                $token = $_REQUEST['token'];
                $token_data = $_REQUEST['token_data'];

                Util::writeCookie(array('value' => $token, 'valueDefault' => $token, 'name' => 'token'));
                Util::writeCookie(array('value' => $token_data, 'valueDefault' => $token_data, 'name' => 'token_data'));
            }else{
                $token = Util::getCookie('token');
                $token_data = Util::getCookie('token_data');
            }

            if (!empty($token) && !empty($token_data) && $this->checkToken($token, $token_data))
                return;

            $allowed = array(
                'site/login',
                'site/logout',
                'site/register',
                'site/captcha',
                'landing/index',
                'landing/giftcode',
                'landing/ajaxAlbum',
                'landing/quickRegister',
                'api/token',
                'api/accountInfo',
                'api/checkLogin',
                'api/servers',
                'api/topPanel',
                'api/adPanel',

                //'play/index',
                //'play/view',
                //'play'
            );
            if (!in_array($request, $allowed)) {
                $this->redirect(array('//landing/index'));
            }
        }
        */
    }

}