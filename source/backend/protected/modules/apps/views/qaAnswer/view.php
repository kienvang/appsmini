<?php
/* @var $this QaAnswerController */
/* @var $model QaAnswer */

$this->breadcrumbs=array(
	'Qa Answers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List QaAnswer', 'url'=>array('index')),
	array('label'=>'Create QaAnswer', 'url'=>array('create')),
	array('label'=>'Update QaAnswer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QaAnswer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QaAnswer', 'url'=>array('admin')),
);
?>

<h1>View QaAnswer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'resource',
		'question_id',
		'is_right',
	),
)); ?>
