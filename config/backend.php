<?php

$pathroot = dirname(dirname(__FILE__));
$backend = $pathroot . DIRECTORY_SEPARATOR . 'source/backend/protected';
$themes = $pathroot . DIRECTORY_SEPARATOR . 'themes';

Yii::setPathOfAlias('pathroot', $pathroot);
Yii::setPathOfAlias('backend', $backend);
Yii::setPathOfAlias('themes', $themes);

return array(
    'basePath'=> $backend,
    'theme' => 'cms',
    'language'	=> 'en',
    'timeZone' => 'Asia/Bangkok',
    'name'=>'Mini game',
    'runtimePath' => $backend . DIRECTORY_SEPARATOR . 'runtime',
    'preload'=>array('log'),
    'import'=>array(
        'application.modules.user.components.*',
        'application.modules.user.models.*',
        'application.modules.log.components.*',
        'application.modules.log.documents.*',
        'application.modules.srbac.models.*',
        'application.modules.srbac.components.*',
        'application.modules.srbac.controllers.SBaseController',
        'application.components.*',
        'application.models.*',
        'application.extensions.*',
        'application.extensions.EWideImage.EWideImage',
        'application.extensions.ymds.*',
        'application.extensions.ymds.extra.*',
    ),
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123456',
            'ipFilters'=>array('*','::1'),
        ),
        'srbac' => array(
            'debug' => false,
            'userclass' => 'SystemUser',
            'userid' => 'id',
            'superUser'=>'Administrator',
            'layout' => 'themes.v1.views.layouts.main',
            'notAuthorizedView' => 'themes.v1.views.srbac.authitem.unauthorized',
        ),
        'user',
        'apps'
    ),
    'components' => CMap::mergeArray(
        array(
            'user'=>array(
                'allowAutoLogin'=>true,
                'loginUrl' => array('//user/auth/login'),
            ),
            'urlManager'=>array(
                'showScriptName' => true,
                'urlFormat'=>'path',
                'rules'=>array(
                    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>'
                ),
            ),
            'errorHandler'=>array(
                'errorAction'=>'site/error',
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                    ),
                ),
            ),
            'assetManager'=>array(
                'basePath'=> dirname(__FILE__).'/../www/backend/assets/',
                'baseUrl'=>'/www/backend/assets/'
            ),
            'themeManager' => array(
                'basePath'=> dirname(__FILE__).'/../themes/',
                'baseUrl'=> '/themes/'
            ),
            'authManager'=>array(
                'class'=>'CDbAuthManager',
                'connectionID'=>'db',
                'itemTable' => 'auth_item',
                'itemChildTable' => 'auth_item_child',
                'assignmentTable' => 'auth_assignment',
            ),
            'clientScript' => array(
                'scriptMap' => array(
                    'jquery.js' => '/themes/assets/javascripts/jquery/modernizr-jquery.min.js',
                    'jquery.ui'=> '/themes/assets/javascripts/jquery-ui-1.10.3/ui/minified/jquery-ui.min.js',
                    'jquery.ui.widget.min.js' => '/themes/assets/javascripts/jquery-ui-1.10.3/ui/minified/jquery.ui.widget.min.js'
                )
            ),
            'session'=>array(
                'cookieMode' => 'allow',
                'cookieParams' => array(
                    'path' => '/',
                )
            ),
            'cache' => array('class' => 'system.caching.CFileCache'),
        ),
        require(dirname(__FILE__).'/_partials/config.php')
    ),
    'behaviors' => array(
        'onBeginRequest' => array(
            'class' => 'application.modules.user.components.RequireLogin'
        )
    ),
    'params'=> CMap::mergeArray(
        array(),
        require(dirname(__FILE__).'/_partials/params.php')
    )
);