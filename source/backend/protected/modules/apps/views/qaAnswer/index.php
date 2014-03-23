<?php
/* @var $this QaAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qa Answers',
);

$this->menu=array(
	array('label'=>'Create QaAnswer', 'url'=>array('create')),
	array('label'=>'Manage QaAnswer', 'url'=>array('admin')),
);
?>

<h1>Qa Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
