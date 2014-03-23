<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        Apps - Sign In
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/1.3.0/adminflare-demo-init.min.js" type="text/javascript"></script>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        var ROOT_URL = "";
        // Include Bootstrap stylesheet
        document.write('<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/' + DEMO_ADMINFLARE_VERSION + '/' + DEMO_CURRENT_THEME + '/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" id="bootstrap-css">');
        // Include AdminFlare stylesheet
        document.write('<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/' + DEMO_ADMINFLARE_VERSION + '/' + DEMO_CURRENT_THEME + '/adminflare.min.css" media="all" rel="stylesheet" type="text/css" id="adminflare-css">');
        // Include AdminFlare page stylesheet
        document.write('<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/css/' + DEMO_ADMINFLARE_VERSION + '/pages.min.css" media="all" rel="stylesheet" type="text/css">');
    </script>

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/1.3.0/modernizr-jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/1.3.0/adminflare-demo.min.js" type="text/javascript"></script>

    <!--[if lte IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/javascripts/jquery.placeholder.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('input, textarea').placeholder();
        });
    </script>
    <![endif]-->

    <script type="text/javascript">
        $(document).ready(function() {
            var updateBoxPosition = function() {
                $('#signin-container').css({
                    'margin-top': ($(window).height() - $('#signin-container').height()) / 2
                });
            };
            $(window).resize(updateBoxPosition);
            setTimeout(updateBoxPosition, 50);
        });
    </script>
</head>
<body class="signin-page">
<section id="signin-container">
    <a href="<?php echo Yii::app()->createUrl('/'); ?>" title="Apps mini" class="header" style="width: 256px">
        <span>Sign in to<br><strong>Apps mini</strong></span>
    </a>
   <?php echo $content; ?>
</section>
</body>
</html>