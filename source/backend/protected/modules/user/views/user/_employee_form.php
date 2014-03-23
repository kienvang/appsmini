    <div class="control-group">
        <?php echo $form->labelEx($model,'branch_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'branch_id', CHtml::listData(ShopBranch::model()->findAll('enable = 1'), 'id', 'name'), array('empty' => ' -- Chọn cửa hàng -- ')); ?>
            <?php echo $form->error($model,'branch_id'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'position_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'position_id', CHtml::listData(ShopPosition::model()->findAll(), 'id', 'name'), array('empty' => ' -- Chọn chức danh -- ')); ?>
            <?php echo $form->error($model,'position_id'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'full_name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>150, 'placeholder' => 'Họ tên')); ?>
            <?php echo $form->error($model,'full_name'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'code', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'code', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập CMND')); ?>
            <?php echo $form->error($model,'code'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'address', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'address', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Địa chỉ nhà')); ?>
            <?php echo $form->error($model,'address'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'cellphone', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'cellphone', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập số điện thoại di động')); ?>
            <?php echo $form->error($model,'cellphone'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'phone', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'phone', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập số điện thoại nhà')); ?>
            <?php echo $form->error($model,'phone'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'employee_enable', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model,'employee_enable', array(1 => 'Có', 0 => 'Không')); ?>
            <?php echo $form->error($model,'employee_enable'); ?>
        </div>
    </div>

    <div class="control-group">
        <?php echo $form->labelEx($model,'email', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model,'email', array('size'=>60,'maxlength'=>150, 'placeholder' => 'Nhập email')); ?>
            <?php echo $form->error($model,'email'); ?>
        </div>
    </div>