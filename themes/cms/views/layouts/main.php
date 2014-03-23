<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/1.3.0/adminflare-demo-init.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		var ROOT_URL = "<?php echo Yii::app()->theme->baseUrl; ?>/";
		document.write('<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/' + DEMO_ADMINFLARE_VERSION + '/' + DEMO_CURRENT_THEME + '/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" id="bootstrap-css">');
		document.write('<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/' + DEMO_ADMINFLARE_VERSION + '/' + DEMO_CURRENT_THEME + '/adminflare.min.css" media="all" rel="stylesheet" type="text/css" id="adminflare-css">');
        document.write('<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/' + DEMO_ADMINFLARE_VERSION + '/pages.min.css" media="all" rel="stylesheet" type="text/css" id="adminflare-css">');
	</script>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/bootstrap-datetimepicker.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/colorbox/colorbox.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/bootstrap-tagsinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/1.3.0/style.css" media="all" rel="stylesheet" type="text/css"/>

    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>


    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/1.3.0/adminflare-demo.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/1.3.0/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/1.3.0/adminflare.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/autoNumeric.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/jquery.colorbox-min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/download.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/script.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">demoSetBodyLayout();</script>
	<!-- Main navigation bar -->
	<header class="navbar navbar-fixed-top" id="main-navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="logo" href="<?php echo Yii::app()->homeUrl; ?>"><img alt="<?php echo Yii::app()->name; ?>" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/images/logo.png"></a>

				<a class="btn nav-button collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-reorder"></span>
				</a>

				<div class="nav-collapse collapse">
                    <?php $this->beginContent('//layouts/_partials/menu_top'); ?><?php $this->endContent(); ?>
                    <!--
					<form class="navbar-search pull-left" action="" _lpchecked="1">
						<input type="text" class="search-query" placeholder="Search" style="width: 120px">
					</form>
					-->
                    <?php $this->beginContent('//layouts/_partials/profile'); ?><?php $this->endContent(); ?>
				</div>
			</div>
		</div>
	</header>
	<!-- / Main navigation bar -->
	<!-- Left navigation panel -->
	<nav id="left-panel">
		<div id="left-panel-content">
            <?php $this->beginContent('//layouts/_partials/menu'); ?><?php $this->endContent(); ?>
		</div>
		<div class="icon-caret-down"></div>
		<div class="icon-caret-up"></div>
	</nav>
	<!-- / Left navigation panel -->
	<!-- Page content -->
	<section class="container">

        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
            'homeLink'=>false,
            'tagName'=>'ul',
            'separator'=>'',
            'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
            'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
            'htmlOptions'=>array ('class'=>'breadcrumb')
		)); ?><!-- breadcrumbs -->
        <?php endif?>

		<!-- Content here -->
		<?php echo $content ?>
		<!-- / Content here -->
		
		<!-- Page footer -->
		<footer id="main-footer">
			<a href="#" class="pull-right" id="on-top-link">
				On Top&nbsp;<i class=" icon-chevron-up"></i>
			</a>
		</footer>
		<!-- / Page footer -->
	</section>
</body>
</html>