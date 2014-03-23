<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'System Users',
);

$this->menu=array(
	array('label'=>'Create SystemUser', 'url'=>array('create')),
	array('label'=>'Manage SystemUser', 'url'=>array('admin')),
);
?>

<h1>System Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
