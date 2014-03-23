<?php
/* @var $this QaResultController */
/* @var $model QaResult */

$this->breadcrumbs=array(
	'Qa Results'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QaResult', 'url'=>array('index')),
	array('label'=>'Create QaResult', 'url'=>array('create')),
	array('label'=>'Update QaResult', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QaResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QaResult', 'url'=>array('admin')),
);
?>

<h1>View QaResult #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'question_params',
		'answer_params',
		'question_id',
		'answer_id',
		'result_text',
		'result_right',
		'result_params',
		'event_id',
	),
)); ?>
