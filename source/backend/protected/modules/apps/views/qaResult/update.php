<?php
/* @var $this QaResultController */
/* @var $model QaResult */

$this->breadcrumbs=array(
	'Qa Results'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QaResult', 'url'=>array('index')),
	array('label'=>'Create QaResult', 'url'=>array('create')),
	array('label'=>'View QaResult', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QaResult', 'url'=>array('admin')),
);
?>

<h1>Update QaResult <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>