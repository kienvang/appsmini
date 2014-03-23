<?php $this->pageTitle = Yii::app()->name . ' - Đăng nhập'; ?>
<div class="qck">
    <ul class="tab clearfix">
        <li><a href="<?php echo Yii::app()->createUrl("//site/login"); ?>" title="Đăng nhập" rel="qcklog" class="btn-qcklog active">Đăng nhập</a></li>
        <li><a href="<?php echo Yii::app()->createUrl("//site/register"); ?>" title="Đăng kí nhanh" rel="qckreg" class="btn-qckreg">Đăng kí nhanh</a></li>
    </ul>
    <div id="qcklog" class="ctTab">
        <?php $this->widget('frontend.widgets.login.Login',array('type'=>'normal')); ?>
    </div>
    <div id="qckreg" class="ctTab" style="display:none">
        <?php $this->widget('frontend.widgets.register.Register',array('type'=>'normal')); ?>
    </div>
</div>