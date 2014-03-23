<?php $this->widget('application.components.BootstrapMenu',array(
	'items'=>array(
		array('label'=>'Hệ thống', 'url'=>'#',
			'itemOptions'=>array('class'=>'dropdown'),
			'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle' => 'dropdown'),
			'items' => array(
				array('label'=>'Phân quyền', 'url'=> array('//srbac'), 'iconBootstrap'=>'icon-circle-arrow-right'),
			),
			'submenuOptions'=>array(
				'class'=>'dropdown-menu',
			)
		),
		array('label'=>'', 'itemOptions'=>array('class'=>'divider-vertical'))
	),
	'htmlOptions'	=> array(
		'class' => 'nav'
	)
));