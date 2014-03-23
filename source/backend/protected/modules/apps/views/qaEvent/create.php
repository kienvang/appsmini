<?php
/* @var $this QaEventController */
/* @var $model QaEvent */

$this->breadcrumbs=array(
	'Qa Events'=>array('index'),
	'Create',
);

?>

<section class="row-fluid">
    <h3 class="box-header">Create Event</h3>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</section>
