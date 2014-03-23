<?php
return array(
    'db'=>array(
        'connectionString' => 'mysql:host=127.0.0.1;dbname=appsmini',
        'emulatePrepare' => true,
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'tablePrefix' => '',
    ),
    'mongodb' => array(
        'class'            => 'EMongoDB',
        'connectionString' => 'mongodb://localhost:27017',
        'dbName'           => 'mtl',
        'fsyncFlag'        => true,
        'safeFlag'         => true,
        'useCursor'        => false
    ),
);