<div class="table-gridview">
    <div id="grid-action" style="margin-bottom: 15px; display: none">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'report-export-excel-form',
        )); ?>
        <?php
        foreach ($items['filter'] as $key => $att){
            if ($key != "chart") echo $form->hiddenField($items['filter'], $key);
        }
        echo $form->hiddenField($items['filter'], 'action_type', array('value' => ReportForm::A_ExportExcel));
        ?>
        <input type="submit" value="Xuất excel" class="btn btn-blue"/>
        <?php $this->endWidget(); ?>
    </div>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'report-submit-data-form',
    )); ?>
    <?php
    foreach ($items['filter'] as $key => $att){
        if ($key != "chart") echo $form->hiddenField($items['filter'], $key);
    }
    ?>

    <?php $this->endWidget(); ?>

    <?php $this->widget('zii.widgets.grid.CGridView', $items); ?>

</div>
<script>
    function afterUpdateAjax(){
    }

    $(function(){
    });
</script>
