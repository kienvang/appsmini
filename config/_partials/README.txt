config.php
<?php
return array(
    'db'=>array(
        'connectionString' => 'mysql:host=172.16.99.17;dbname=mtl',
        'emulatePrepare' => true,
        'username' => 'vagrant',
        'password' => 'vagrant',
        'charset' => 'utf8',
        'tablePrefix' => '',
    ),
);

params.php
<?php
return array(
    'adminEmail'=>'phuong.pham@teamservices.vn',
    'webRoot' => dirname(dirname(dirname(__FILE__))),
    'product' => array(
        'thumb' => array('width' => 170, 'height' => 120),
        'cover' => array('width' => 600, 'height' => 400),
        'crop' => array('width' => 750, 'height' => 550),
        'origin' => array('width' => 915, 'height' => 920),
    ),
);