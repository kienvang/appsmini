<?php
/* @var $this QaQuestionController */
/* @var $model QaQuestion */

$this->breadcrumbs=array(
	'Qa Questions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List QaQuestion', 'url'=>array('index')),
	array('label'=>'Create QaQuestion', 'url'=>array('create')),
	array('label'=>'Update QaQuestion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QaQuestion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QaQuestion', 'url'=>array('admin')),
);
?>

<h1>View QaQuestion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'number',
		'name',
		'type',
	),
)); ?>
