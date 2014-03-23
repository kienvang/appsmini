<?php
/* @var $this QaQuestionController */
/* @var $model QaQuestion */

$this->breadcrumbs=array(
	'Qa Questions'=>array('index'),
	'Manage',
);

?>
<section class="row-fluid">
    <h3 class="box-header">Manage Questions</h3>
    <div class="box">
        <?php $this->widget('application.widgets.ButtonToolbar',array('menu' => array(
            array('label' => 'Add Question', 'url' => Yii::app()->createUrl('/apps/qaQuestion/create'), 'iconBootstrap'=>'icon-plus', 'linkOptions' =>  array('class'=>'btn btn-blue'))
        ))) ?>
        <?php $this->widget('application.widgets.GridView', array('items' => array(
            'id'=>'qa-question-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
                'number',
                'name',
                'type',
                array(
                    'class'=>'CButtonColumn',
                ),
            ),
        ))); ?>
    </div>
</section>