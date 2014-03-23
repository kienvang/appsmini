<div class="table-gridview">
    <?php if ($is_action) {?>
    <div id="div-grid-excel-action">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'export-excel-form',
            'htmlOptions' => array('class' => 'export-excel-form')
        )); ?>
        <button type="button" class="btn btn-small"><i class="icon icon-white icon-table"></i> Xuất excel</button>
        <?php $this->endWidget(); ?>
    </div>
    <?php } ?>
    <?php if ($is_view) {?>
    <div class="row-fluid">
        <div class="<?php echo $cssClass; ?> cgrid-view">
            <?php $this->widget('zii.widgets.grid.CGridView', $items); ?>
        </div>
        <input type="hidden" id="url_view" value="<?php echo $url_view ?>">
    </div>
    <?php }else{ ?>
        <?php $this->widget('zii.widgets.grid.CGridView', $items); ?>
    <?php } ?>

    <div class="hide">
        <img id="loading" src="<?php echo Yii::app()->theme->baseUrl .'/resources/assets/images/loading.gif'; ?>">
    </div>
    <div class="modal-gridview modal hide fade" tabindex="-1" role="dialog" aria-labelledby=" myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Xem thông tin</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn" data-dismiss="modal" aria-hidden="true">Thoát</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){


    });
</script>

<?php
Yii::app()->clientScript->registerScript("cgridviewa", "

    function afterUpdateAjax(){
        $('.table-grid input[type=text]').addClass('input-block-level');
        for (i=0; i<grid_function_array.length; i++){
            grid_function_array[i]();
        }
    }

    function callbackView(){
        ".$callbackView."
    }

    $(function(){
        $('.table-grid input[type=text]').addClass('input-block-level');

        function loadInfor(url, that){
            $('img', that).hide();
            that.append('<img class=\"ajaxload\" src=\"' + $(\"#loading\").attr('src') +  '\" />');

            var cgrid = getNodeParent(that, '.table-gridview');

            $.get(url, function(data) {
                $('.modal-gridview .modal-body', cgrid).html(data);
                $('.ajaxload', that).remove();
                $('img', that).show();
                $(\".modal-gridview\", cgrid).modal('show');
                callbackView();
            });
        }

        $('.table-gridview').on('click', '.button-column .view', function() {
            $(this).parent().parent().click();
        });

        $(\".cgrid-view\").on( \"click\", \".button-column .view\", function() {
            $(this).parent().parent().click();
            loadInfor($(this).attr('href'), $(this));
            return false;
        });

        $('.export-excel-form button').click(function(){
            var cgrid = getNodeParent($(this), '.table-gridview');
            var form = getNodeParent($(this), 'form');
            //var input = new Array();
            $('input', form).remove();
            var inputs = '';
            $('.table-grid .filters input, .table-grid .filters select', cgrid).each(function(){
                //input.push({\"name\": $(this).attr('name'), 'value':$(this).val()})
                inputs+='<input type=\"hidden\" name=\"'+ $(this).attr('name') +'\" value=\"'+ encodeURIComponent($(this).val()) +'\" />';
            });
            inputs+='<input type=\"hidden\" name=\"export_excel\" value=\"1\" />';
            //input.push({\"name\":\"export_excel\", \"value\":1});
            form.append(inputs);
            form.submit();
        });

    });
");
?>
