<?php
$this->breadcrumbs=array(
    'Home'=>array('/'),
    'Quản lý nhân viên' => array('//user/user/admin'),
    'Tạo mới',
);
?>
<section class="row-fluid">
    <h3 class="box-header">Tạo mới nhân viên</h3>
    <?php $this->renderPartial('_form', array('model'=>$model, 'passwordForm' => $passwordForm, 'employee' => $employee)); ?>
</section>