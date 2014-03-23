<?php
/* @var $this QaResultController */
/* @var $model QaResult */

$this->breadcrumbs=array(
	'Qa Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QaResult', 'url'=>array('index')),
	array('label'=>'Manage QaResult', 'url'=>array('admin')),
);
?>

<h1>Create QaResult</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>