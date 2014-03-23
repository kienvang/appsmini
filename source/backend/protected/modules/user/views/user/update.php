<?php
$this->breadcrumbs=array(
    'Home'=>array('/'),
    'Quản lý nhân viên' => array('//user/user/admin'),
    'Cập nhật',
);
?>
<?php $this->renderPartial('_form', array('model'=>$model, 'passwordForm' => $passwordForm, 'employee' => $employee)); ?>
