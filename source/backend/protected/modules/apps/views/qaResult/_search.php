<?php
/* @var $this QaResultController */
/* @var $model QaResult */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_params'); ?>
		<?php echo $form->textField($model,'question_params',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer_params'); ?>
		<?php echo $form->textArea($model,'answer_params',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'answer_id'); ?>
		<?php echo $form->textField($model,'answer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'result_text'); ?>
		<?php echo $form->textField($model,'result_text',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'result_right'); ?>
		<?php echo $form->textField($model,'result_right'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'result_params'); ?>
		<?php echo $form->textArea($model,'result_params',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->