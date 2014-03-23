<?php
/* @var $this QaQuestionController */
/* @var $model QaQuestion */
/* @var $form CActiveForm */

$cs = Yii::app()->clientScript;
$cs->registerCoreScript( 'jquery.ui' );
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/answer.js', CClientScript::POS_BEGIN);
?>

<div class="form">
    <div class="box">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'qa-question-form',
        'enableAjaxValidation'=>false,
        'clientOptions'=> array(
            'validateOnSubmit'=>true,
        ),
        'enableClientValidation'=>true,
        'htmlOptions' => array(
            'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data'
        )
    )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model, "", null, array('class' => 'alert alert-error')); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="control-group">
            <?php echo $form->labelEx($model,'number', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'number'); ?>
                <?php echo $form->error($model,'number'); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->error($model,'name'); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'type', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php if ($model->isNewRecord) {?>
                <?php echo CHtml::activeDropDownList($model, 'type', QaQuestion::model()->getOptions(), array('empty' => ' --- Select type --- ')); ?>
                <?php echo $form->error($model,'type'); ?>
                <?php }else{ echo $model->getTypeName(); }?>
            </div>
        </div>

        <?php if (!$model->isNewRecord && $model->type != QaQuestion::QA_TEXT) {?>
        <div class="control-group">
            <label class="control-label">&nbsp;</label>
            <fieldset class="answer">
                <legend>Answer</legend>
                <table class="table">
                    <tr>
                        <th>Đáp án</th>
                        <th>Thông tin</th>
                        <?php if ($model->type == QaQuestion::QA_OPTION_IMAGE) { ?>
                            <th>Hình ảnh</th>
                            <th>Xóa</th>
                        <?php } ?>
                        <th></th>
                    </tr>
                    <?php
                    $answer = QaAnswer::model()->getForEdit($model->id);
                    foreach ($answer as $item){
                        $this->renderPartial('item_answer', array('data' => $item, 'type' => $model->type));
                    }
                    ?>
                </table>
                <a href="<?php echo Yii::app()->createUrl('//apps/qaQuestion/addMoreAnswer', array('type' => $model->type)) ?>" class="btn hide" id="add_more"><i class="icon-plus"></i>Add more</a>
            </fieldset>
        </div>
        <?php } ?>

        <div class="row buttons form-actions">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => 'btn btn-primary')); ?>
            <a href="<?php echo Yii::app()->createUrl('//apps/qaQuestion') ?>" class="btn">Cancel</a>
        </div>

    <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->