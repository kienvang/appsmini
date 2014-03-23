<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'system-user-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal'
    )
)); ?>
<section class="row-fluid">
    <div class="form-actions" style="padding-left:0px;text-align: right;margin-bottom: 0px;">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'create') : Yii::t('app', 'save_changes'), array('class' => 'btn btn-primary')); ?>
        <?php echo CHtml::button(Yii::t('app', 'cancel'), array('onclick' => 'location.href="'.Yii::app()->createUrl('//user/user/admin').'"', 'class' => 'btn')); ?>
    </div>
</section>
<section class="row-fluid">
    <div class="span6">
        <h3 class="box-header">Thông tin đăng nhập</h3>
        <div class="box">
            <div class="control-group">
                <?php echo $form->labelEx($model,'username', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>32, 'placeholder' => 'Tên đăng nhập')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>
            </div>

            <?php $this->renderPartial('/user/_password_form', array('model'=> $passwordForm, 'form' => $form)); ?>

            <div class="control-group">
                <?php echo $form->labelEx($model,'superuser', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'superuser', array(0 => 'No', 1 => 'Yes')); ?>
                    <?php echo $form->error($model,'superuser'); ?>
                </div>
            </div>

            <div class="control-group">
                <?php echo $form->labelEx($model,'status', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'status', array('0' => 'Not active','1' => 'Active','-1' => 'Banned','-2' => 'Deleted')); ?>
                    <?php echo $form->error($model,'status'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="span6">
        <h3 class="box-header">Thông tin nhân viên</h3>
        <div class="box">
            <?php $this->renderPartial('/user/_employee_form', array('model'=> $employee, 'form' => $form)); ?>
        </div>
    </div>
</section>
<?php $this->endWidget(); ?>

