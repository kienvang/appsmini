<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <fieldset>
        <div class="fields">
            <?php echo $form->textField($model,'username', array('placeholder' => 'Username', )); ?>
            <?php echo $form->passwordField($model,'password', array('placeholder' => 'Password')); ?>
            <?php //echo $form->error($model,'username'); ?>
            <?php //echo $form->error($model,'password'); ?>
        </div>
        <a href="#" title="" tabindex="3" class="forgot-password">Forgot?</a>
        <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign In</button>
    </fieldset>

<?php $this->endWidget(); ?>