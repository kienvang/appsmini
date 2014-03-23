<?php
/* @var $this QaResultController */
/* @var $data QaResult */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_params')); ?>:</b>
	<?php echo CHtml::encode($data->question_params); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_params')); ?>:</b>
	<?php echo CHtml::encode($data->answer_params); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('question_id')); ?>:</b>
	<?php echo CHtml::encode($data->question_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_id')); ?>:</b>
	<?php echo CHtml::encode($data->answer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result_text')); ?>:</b>
	<?php echo CHtml::encode($data->result_text); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('result_right')); ?>:</b>
	<?php echo CHtml::encode($data->result_right); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result_params')); ?>:</b>
	<?php echo CHtml::encode($data->result_params); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::encode($data->event_id); ?>
	<br />

	*/ ?>

</div>