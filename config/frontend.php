<?php

$pathroot   = dirname(dirname(__FILE__));
$frontend   = $pathroot . DIRECTORY_SEPARATOR . 'source/frontend/protected';
$backend    = $pathroot . DIRECTORY_SEPARATOR . 'source/backend/protected';
$themes     = $pathroot . DIRECTORY_SEPARATOR . 'www/themes';
$vendors    = $pathroot . DIRECTORY_SEPARATOR . 'www/forum/library';

Yii::setPathOfAlias('pathroot', $pathroot);
Yii::setPathOfAlias('frontend', $frontend);
Yii::setPathOfAlias('backend', $backend);
Yii::setPathOfAlias('themes', $themes);
Yii::setPathOfAlias('vendors', $vendors);

return array(
    'basePath'=> $frontend,
    'name'=> 'Mini game',
    'preload'=>array('log'),
    'theme' => 'v2',
    'modulePath' => $backend.'/modules',
    'language' => 'vi',
    'import'=>array(
        'vendors.*',
        'backend.components.*',
        'backend.modules.user.models.*',
        'backend.extensions.ymds.*',
        'backend.extensions.ymds.extra.*',
        'application.models.*',
        'application.components.*',
    ),
    'modules'=>array(

    ),
    'components' => CMap::mergeArray(
        array(
            'user'=>array(
                'class' => 'application.components.WebUser',
                'allowAutoLogin' => true,
                'loginUrl' => array('//site/login'),
            ),
            'urlManager'=>array(
                'showScriptName' => false,
                'urlFormat'=>'path',
                'rules'=> CMap::mergeArray(
                    require(dirname(__FILE__).'/urls.php'),
                    array(
                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    )
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
                'basePath'=> dirname(__FILE__).'/../www/assets/',
                'baseUrl'=>'/www/assets/'
            ),
            'themeManager' => array(
                'basePath'=> dirname(__FILE__).'/../themes/',
                'baseUrl'=> '/themes/'
            ),
            'clientScript' => array(
                'scriptMap' => array(
                    'jquery.js' => '/themes/assets/javascripts/jquery/modernizr-jquery.min.js',
                    'jquery.ui'=> '/themes/assets/javascripts/jquery-ui-1.10.3/ui/minified/jquery-ui.min.js',
                    'jquery.ui.widget.min.js' => '/themes/assets/javascripts/jquery-ui-1.10.3/ui/minified/jquery.ui.widget.min.js'
                )
            ),
            'CURL' =>array(
                'class' => 'backend.extensions.curl.Curl',
            ),
            'curl2' => array(
                'class' => 'backend.components.curl.Curl',
                'options' => array()
            ),
            //'cacheFO' => array('class' => 'backend.components.FileCache'),
            //'cache' => array('class' => 'backend.components.FileCache'),
            /*
            'session'=>array(
                'class'                     => 'EMongoDbHttpSession',
                'connectionString'          => 'localhost:27017',
                'cookieMode'                => 'allow',
                'timeout'                   => 300,
                'cookieParams'      => array(
                    'path'          => '/',
                    'domain'        => '.tethien.vn'
                )
            ),
            */
            'widgetFactory'=>array(
                'widgets'=>array(
                    'CGridView'=>array(
                        'cssFile' => FALSE,
                    )
                )
            )
        ),
        require(dirname(__FILE__).'/_partials/config.php')
    ),
    'behaviors' => array(
        'onBeginRequest' => array(
            'class'=>'application.components.BeginRequestBehavior'
        )
    ),
    'params'=> CMap::mergeArray(
        array(
            'cache_expire' => 604800,//7 days
            'environment' => 'product',
            'urls' => array(
                'id.like.vn' => 'https://id.like.vn',
                'fanpage'    => 'https://www.facebook.com/tethien.vn'
            ),
            'phpmailer' => array(
                'transport' => 'smtp',
                'html' => true,
                'properties' => array(
                    'CharSet' => 'UTF-8',
                    'SMTPDebug' => false,
                    'SMTPAuth' => true,
                    'SMTPSecure' => 'ssl',
                    'Host' => 'mail.www.vn',
                    'Port' => 465,
                    /*'Username' => '',
                    'Password' => '',*/
                ),
                'msgOptions'=>array(
                    'fromName' => 'Tề Thiên - Tethien.vn',
                    'toName'   => 'Tề Thiên - Tethien.vn',
                ),
            ),
        ),
        require(dirname(__FILE__).'/_partials/params.php')
    ),
);