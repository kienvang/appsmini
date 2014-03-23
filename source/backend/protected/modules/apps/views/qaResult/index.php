<?php
/* @var $this QaResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qa Results',
);

$this->menu=array(
	array('label'=>'Create QaResult', 'url'=>array('create')),
	array('label'=>'Manage QaResult', 'url'=>array('admin')),
);
?>

<h1>Qa Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
