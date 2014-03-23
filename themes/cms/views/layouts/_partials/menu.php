<?php $this->widget('application.components.BootstrapMenu',array(
    'items'=>array(
        array('label'=>'Màn hình chính', 'url'=>array('/site/index'), 'iconBootstrap'=>'icon-dashboard', 'iconTag'=>'span'),
        array('label'=>'Apps', 'url' => '#',
            'itemOptions'=>array('class'=>'lp-dropdown'),
            'linkOptions'=>array('class'=>'lp-dropdown-toggle', 'id'=>'customer-dropdown'),
            'iconBootstrap'=>'icon-leaf', 'iconTag'=>'span',
            'items' => array(
                array('label'=>'Event', 'url'=> array('//apps/qaEvent'), 'iconBootstrap'=>'icon-circle-arrow-right'),
                array('label'=>'Question', 'url'=> array('//apps/qaQuestion'), 'iconBootstrap'=>'icon-circle-arrow-right'),
                array('label'=>'Result', 'url'=> array('//apps/qaResult'), 'iconBootstrap'=>'icon-circle-arrow-right'),
            ),
            'submenuOptions'=>array(
                'class'=>'lp-dropdown-menu simple',
                'data-dropdown-owner'=>'customer-dropdown'
            )
        ),
    )
)); ?>