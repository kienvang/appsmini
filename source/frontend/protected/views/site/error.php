<?php $this->pageTitle=Yii::app()->name . ' - Lỗi'; ?>
<div class="boxTop clearfix">
    <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>array(
			   'Lỗi'
			),
			'tagName'=>'ul',
			'separator'=>'',
			'activeLinkTemplate'=>'<li><a href="{url}">{label}</a>> </li>',
			'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
			'homeLink'=>'<li>'.CHtml::link('Home','http://dev.tethien.vn').' > </li>',
			'htmlOptions'=>array('class'=>'breadcrumb clearfix'),
		)); ?><!-- breadcrumbs -->

    <h2><a class="title-error" href="<?php echo Yii::app()->createURL('//article/category',array('slug'=>'all'));?>">Lỗi</a></h2>
</div>

<div class="boxBottom">
    <div class="container">
        <div class="tin-tuc error">
            <div class="art-title">
                <h1>Lỗi</h1>
            </div>
            <div class="art-cont" style="min-height: 500px;">
                <p><?php echo CHtml::encode($message); ?></p>
            </div>
            <div class="art-nav clearfix">
                <span class="author">Tề Thiên</span>
            </div>
        </div>
    </div>
</div>