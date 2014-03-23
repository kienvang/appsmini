<?php
/* @var $this QaQuestionController */
/* @var $model QaQuestion */

$this->breadcrumbs=array(
	'Qa Questions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>

<section class="row-fluid">
    <h3 class="box-header">Update Question - <?php echo $model->number . " : " . $model->name; ?></h3>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</section>