<div class="control-group pwd">
    <?php echo $form->labelEx($model,'password', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128, 'placeholder' => 'Mật khẩu')); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>
</div>

<div class="control-group pwd">
    <?php echo $form->labelEx($model,'verifyPassword', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->passwordField($model,'verifyPassword',array('size'=>60,'maxlength'=>128, 'placeholder' => 'Nhập lại mật khẩu')); ?>
        <?php echo $form->error($model,'verifyPassword'); ?>
    </div>
</div>
<script>
    $(function(){
        setTimeout(function(){
            $('.pwd input').val('');
        },100);

    });
</script>