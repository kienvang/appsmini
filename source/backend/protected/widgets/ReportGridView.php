<?php
class ReportGridView extends CWidget {

    public $cssClass = '';
    public $items;
    public $view = 'view';

    public function run(){
        $this->items = array_merge($this->items, array(
            'id' => 'report-grid',
            'itemsCssClass' => 'table table-bordered table-striped table-grid',
            'pagerCssClass' => 'pagination',
            'pager'=>array(
                'htmlOptions'=>array('class'=>''),
                'header'         => '',
                'firstPageLabel' => '&lt;&lt;',
                'prevPageLabel'  => '&lt;',
                'nextPageLabel'  => '&gt;',
                'lastPageLabel'  => '&gt;&gt;',
                'selectedPageCssClass' => 'active'
            ),
            'afterAjaxUpdate'=>'function(id, data){afterUpdateAjax();}'
        ));

        $stt = array(array(
            'header' => 'STT',
            'value'  => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions' => array('style' => 'text-align: center; width: 4%'),
            'headerHtmlOptions' => array('style' => 'text-align: center')
        ));

        $this->items['columns'] = array_merge($stt, $this->items['columns']);

        $this->render('grid_report', array('cssClass' => $this->cssClass,
            'items' => $this->items,
        ));
    }
}