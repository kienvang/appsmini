<?php
/* @var $this QaAnswerController */
/* @var $model QaAnswer */

$this->breadcrumbs=array(
	'Qa Answers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QaAnswer', 'url'=>array('index')),
	array('label'=>'Create QaAnswer', 'url'=>array('create')),
	array('label'=>'View QaAnswer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QaAnswer', 'url'=>array('admin')),
);
?>

<h1>Update QaAnswer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>