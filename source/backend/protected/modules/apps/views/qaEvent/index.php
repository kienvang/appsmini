<?php
/* @var $this QaEventController */
/* @var $model QaEvent */

$this->breadcrumbs=array(
	'Qa Events'=>array('index'),
	'Manage',
);

?>
<section class="row-fluid">
    <h3 class="box-header">Manage Events</h3>
    <div class="box">
        <?php $this->widget('application.widgets.ButtonToolbar',array('menu' => array(
            array('label' => 'Add Event', 'url' => Yii::app()->createUrl('/apps/qaEvent/create'), 'iconBootstrap'=>'icon-plus', 'linkOptions' =>  array('class'=>'btn btn-blue'))
        ))) ?>
        <?php $this->widget('application.widgets.GridView', array('items' => array(
            'id'=>'qa-event-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                'name',
                array(
                    'name' => 'start_date',
                    'value' => 'date("d/m/Y", $data->start_date)'
                ),
                array(
                    'name' => 'end_date',
                    'value' => 'date("d/m/Y", $data->end_date)'
                ),
                'enable',
                array(
                    'class'=>'CButtonColumn',
                ),
            ),
        ))); ?>
    </div>
</section>
