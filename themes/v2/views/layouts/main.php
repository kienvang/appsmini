<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php $this->beginContent('//layouts/_partials/meta'); ?><?php $this->endContent(); ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php $this->beginContent('//layouts/_partials/css'); ?><?php $this->endContent(); ?>
</head>
<body>
    <?php $this->beginContent('//layouts/_partials/toplink'); ?><?php $this->endContent(); ?>
	<div class="header">
	</div>
	<div class="wrapper clearfix">
		<div class="mainContent clearfix">
            <?php echo $content; ?>
    	</div>
    </div>

    <?php $this->beginContent('//layouts/_partials/js'); ?><?php $this->endContent(); ?>
</body>
</html>