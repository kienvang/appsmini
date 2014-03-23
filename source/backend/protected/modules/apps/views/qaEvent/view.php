<?php
/* @var $this QaEventController */
/* @var $model QaEvent */

$this->breadcrumbs=array(
	'Qa Events'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List QaEvent', 'url'=>array('index')),
	array('label'=>'Create QaEvent', 'url'=>array('create')),
	array('label'=>'Update QaEvent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QaEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QaEvent', 'url'=>array('admin')),
);
?>

<h1>View QaEvent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'start_date',
		'end_date',
		'enable',
	),
)); ?>
