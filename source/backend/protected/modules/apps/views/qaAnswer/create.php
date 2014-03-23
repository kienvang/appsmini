<?php
/* @var $this QaAnswerController */
/* @var $model QaAnswer */

$this->breadcrumbs=array(
	'Qa Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QaAnswer', 'url'=>array('index')),
	array('label'=>'Manage QaAnswer', 'url'=>array('admin')),
);
?>

<h1>Create QaAnswer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>