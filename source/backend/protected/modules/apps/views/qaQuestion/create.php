<?php
/* @var $this QaQuestionController */
/* @var $model QaQuestion */

$this->breadcrumbs=array(
	'Qa Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QaQuestion', 'url'=>array('index')),
	array('label'=>'Manage QaQuestion', 'url'=>array('admin')),
);
?>

<section class="row-fluid">
    <h3 class="box-header">Create Question</h3>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</section>