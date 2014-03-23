<?php
/* @var $this QaEventController */
/* @var $model QaEvent */
/* @var $form CActiveForm */
?>

<div class="form">
    <div class="box">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'qa-event-form',
            'enableAjaxValidation'=>false,
            'clientOptions'=> array(
                'validateOnSubmit'=>true,
            ),
            'enableClientValidation'=>true,
            'htmlOptions' => array(
                'class' => 'form-horizontal'
            )
        )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model, "", null, array('class' => 'alert alert-error')); ?>

        <div class="control-group">
            <?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'name'); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'start_date', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'start_date',array('class' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')); ?>
                <?php echo $form->error($model,'start_date'); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'end_date', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'end_date',array('class' => 'datepicker', 'data-date-format' => 'dd/mm/yyyy')); ?>
                <?php echo $form->error($model,'end_date'); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'enable', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo CHtml::activedropDownList($model,'enable', array(0 => 'Disable', 1 => 'Enable')); ?>
                <?php echo $form->error($model,'enable'); ?>
            </div>
        </div>

        <div class="row buttons form-actions">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => 'btn btn-primary')); ?>
            <a href="<?php echo Yii::app()->createUrl('//apps/qaEvent') ?>" class="btn">Cancel</a>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->