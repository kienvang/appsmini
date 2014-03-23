<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <section class="row-fluid main" id="content">
        <?php if(isset($this->menu) && count($this->menu) > 0){ ?>
            <div class="span2"><?php $this->beginContent('//layouts/_partials/menu_sub'); ?><?php $this->endContent(); ?></div>
            <div class="span10"><?php echo $content; ?><div>
        <?php }else{ ?>
            <?php echo $content; ?>
        <?php } ?>
    </section>
<?php $this->endContent(); ?>