<?php
class ElfinderController extends CController
{
    public function actions()
    {
        return array(
            'connector' => array(
                'class' => 'application.extensions.elFinder.ElFinderConnectorAction',
                'settings' => array(
                    'root' => Yii::getPathOfAlias('webroot') . '/../../uploads',
                    'URL' => '/uploads/',
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none'
                )
            ),
        );
    }
}