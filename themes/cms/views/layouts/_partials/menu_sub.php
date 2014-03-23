<div class="well" style="max-width: 340px; padding: 8px 0;">
    <?php
    $this->widget('zii.widgets.CMenu', array(
        'items'=> $this->menu,
        'htmlOptions'=>array('class'=>'nav nav-list')
    ));
    ?>
</div>