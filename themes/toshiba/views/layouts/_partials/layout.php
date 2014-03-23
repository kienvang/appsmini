<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/css/font.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/css/style.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->baseUrl; ?>/themes/assets/icheck/skins/all.css?v=1.0.2" rel="stylesheet">

    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
    <script src="<?php echo Yii::app()->baseUrl; ?>/themes/assets/icheck/icheck.js?v=1.0.2"></script>
</head>
<body>
    <div class="wrapper clearfix">
        <?php $this->beginContent('//layouts/_partials/toplink'); ?><?php $this->endContent(); ?>
        <?php echo $content ?>
    </div>
</body>
</html>