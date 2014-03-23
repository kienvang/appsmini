<?php
/* @var $this QaEventController */
/* @var $model QaEvent */

$this->breadcrumbs=array(
	'Qa Events'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>

<section class="row-fluid">
    <h3 class="box-header">Update Event - <?php echo $model->name; ?></h3>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</section>
