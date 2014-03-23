<?php
/* @var $this QaResultController */
/* @var $model QaResult */

$this->breadcrumbs=array(
	'Qa Results'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List QaResult', 'url'=>array('index')),
	array('label'=>'Create QaResult', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#qa-result-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Qa Results</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qa-result-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'question_params',
		'answer_params',
		'question_id',
		'answer_id',
		/*
		'result_text',
		'result_right',
		'result_params',
		'event_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
