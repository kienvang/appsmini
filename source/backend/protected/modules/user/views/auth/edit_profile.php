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
            <?php echo CHtml::submitButton(Yii::t('app', 'save_changes'), array('class' => 'btn btn-primary')); ?>
            <?php echo CHtml::button(Yii::t('app', 'cancel'), array('onclick' => 'location.href="'.Yii::app()->createUrl('//user/user/admin').'"', 'class' => 'btn')); ?>
        </div>
    </section>
    <section class="row-fluid">
        <div class="span6">
            <h3 class="box-header">Thông tin đăng nhập</h3>
            <div class="box form-password">
                <div class="control-group">
                    <?php echo $form->labelEx($passwordForm,'currentPassword', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->passwordField($passwordForm,'currentPassword',array('size'=>60,'maxlength'=>128, 'placeholder' => 'Mật khẩu hiện tại')); ?>
                        <?php echo $form->error($passwordForm,'currentPassword'); ?>
                    </div>
                </div>
                <?php $this->renderPartial('/user/_password_form', array('model'=> $passwordForm, 'form' => $form)); ?>
            </div>
        </div>
        <div class="span6">
            <h3 class="box-header">Thông tin cá nhân</h3>
            <div class="box">
                <div class="control-group">
                    <?php echo $form->labelEx($employee,'full_name', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($employee,'full_name',array('size'=>60,'maxlength'=>150, 'placeholder' => 'Họ tên')); ?>
                        <?php echo $form->error($employee,'full_name'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($employee,'code', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($employee,'code', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập CMND')); ?>
                        <?php echo $form->error($employee,'code'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($employee,'address', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($employee,'address', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Địa chỉ nhà')); ?>
                        <?php echo $form->error($employee,'address'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($employee,'cellphone', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($employee,'cellphone', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập số điện thoại di động')); ?>
                        <?php echo $form->error($employee,'cellphone'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($employee,'phone', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($employee,'phone', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập số điện thoại nhà')); ?>
                        <?php echo $form->error($employee,'phone'); ?>
                    </div>
                </div>

                <div class="control-group">
                    <?php echo $form->labelEx($employee,'email', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($employee,'email', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập email')); ?>
                        <?php echo $form->error($employee,'email'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->endWidget(); ?>
<script>
    $(function(){
        setTimeout(function(){
            $('.form-password input').val('');
        },100);

    });
</script>