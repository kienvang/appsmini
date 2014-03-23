<footer role="contentinfo" class="bs-footer">
	<p>Tề Thiên &copy;2014</p>
    <?php if(Yii::app()->params->environment == 'product') : ?>
        <?php $google_setting =  SystemSetting::model()->getGoogletrackercode(); ?>
        <?php $this->widget('frontend.widgets.googleAnalytics.EGoogleAnalyticsWidget',array(
            'account'		=> $google_setting['account'],
            'domainName'	=> $google_setting['domainName'],
            'searchSystems' => array()
        ));?>
    <?php endif ?>
</footer>