<?php
/* @var $this QaResultController */
/* @var $model QaResult */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qa-result-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_params'); ?>
		<?php echo $form->textField($model,'question_params',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'question_params'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer_params'); ?>
		<?php echo $form->textArea($model,'answer_params',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'answer_params'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id'); ?>
		<?php echo $form->error($model,'question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer_id'); ?>
		<?php echo $form->textField($model,'answer_id'); ?>
		<?php echo $form->error($model,'answer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'result_text'); ?>
		<?php echo $form->textField($model,'result_text',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'result_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'result_right'); ?>
		<?php echo $form->textField($model,'result_right'); ?>
		<?php echo $form->error($model,'result_right'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'result_params'); ?>
		<?php echo $form->textArea($model,'result_params',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'result_params'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->