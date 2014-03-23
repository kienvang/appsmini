<?php
$this->breadcrumbs=array(
    'Home'=>array('/'),
    'Quản lý nhân viên',
);
?>
<section class="row-fluid">
    <h3 class="box-header">Danh sách các nhân viên</h3>
    <div class="box">
        <?php $this->widget('application.widgets.ButtonToolbar',array('menu' => array(
            array('label' => 'Thêm mới',
                'url' => Yii::app()->createUrl('/user/user/create'),
                'iconBootstrap'=>'icon-plus',
                'linkOptions' =>  array('class'=>'btn btn-blue')
            )
        )));
        ?>
        <?php $this->widget('application.widgets.GridView', array('items' => array(
            'id'=>'system-user-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'itemsCssClass' => 'table table-bordered table-striped',
            'columns'=>array(
                'username',
                array(
                    'header' => 'Tên NV',
                    'value'  => '$data->profile ? $data->profile->full_name : ""'
                ),
                array(
                    'name' => 'status',
                    'value' => '$data->getStatus()',
                    'filter' => $model->getListStatus()
                ),
                array(
                    'name' => 'createtime',
                    'value' => 'Utility::getFormatDate($data->createtime)',
                    'filter' => false
                ),
                array(
                    'name' => 'lastvisit',
                    'value' => 'Utility::getFormatDate($data->lastvisit)',
                    'filter' => false
                ),
                array(
                    'class'=>'CButtonColumn',
                ),
            ),
        ))); ?>
    </div>
</section>