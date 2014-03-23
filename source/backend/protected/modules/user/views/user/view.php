<?php
$this->breadcrumbs=array(
    'Home'=>array('/'),
    'Quản lý nhân viên' => array('//user/user/admin'),
    'Thông tin',
);
?>
<section class="row-fluid">
    <h3 class="box-header">Thông tin nhân viên</h3>
    <div class="box">
    <?php if(isset($model->profile)) { ?>
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model->profile,
            'attributes'=>array(
                'full_name',
                'code',
                'address',
                'phone',
                'email',
                //'supervisor',
                'position',
                'cellphone',
                array(
                    'name' => 'branch_id',
                    'value' => $model->profile->branch->name
                )
            ),
        )); ?>
    <?php } else { ?>
        Chưa có thông tin chi tiết. Bạn vui lòng cập nhật <a href="<?php echo Yii::app()->createUrl('//user/user/update', array('id' => $model->id)); ?>">tại đây</a>
    <?php } ?>
    </div>
</section>