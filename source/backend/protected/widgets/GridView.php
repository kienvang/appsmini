<?php
class GridView extends CWidget {

    public $cssClass = '';
    public $items;
    public $view = 'view';

    public function run(){
        $this->items = array_merge($this->items, array(
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

        $this->items['dataProvider']->setPagination(array('pageSize' => 20));

        $is_button = false;
        foreach ($this->items['columns'] as $col){
            if (is_array($col) && isset($col['class'])){
                $is_button = true;
                break;
            }
        }
        $is_show_button = true;
        if (isset($this->items['is_button'])){
            $is_show_button = $this->items['is_button'];
            unset($this->items['is_button']);
        }

        $action = array('export_excel' => false);
        $is_action = false;
        if (isset($this->items['export_excel'])){
            $action['export_excel'] = $this->items['export_excel'];
            unset($this->items['export_excel']);
        }
        foreach ($action as $ac)
            if ($ac)
                $is_action = true;

        $stt = array(array(
            'header' => 'STT',
            'value'  => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
            'htmlOptions' => array('style' => 'text-align: center; width: 4%'),
            'headerHtmlOptions' => array('style' => 'text-align: center')
        ));
        if (!$is_button){
            if ($is_show_button)
                $this->items['columns'] = array_merge($stt, $this->items['columns'], array(array(
                    'class'=>'CButtonColumn',
                )));
            else
                $this->items['columns'] = array_merge($stt, $this->items['columns']);
        }else{
            $this->items['columns'] = array_merge($stt, $this->items['columns']);
        }

        $url = array(
            Yii::app()->getController()->getModule()->id,
            Yii::app()->getController()->id,
            $this->view . '/id'
        );
        $url = Yii::app()->createUrl('/' . implode('/', $url));

        $is_view = true;
        if (isset($this->items['is_view'])){
            $is_view = $this->items['is_view'];
            unset($this->items['is_view']);
        }
        $callbackView = "";
        if (isset($this->items['callback_view'])){
            $callbackView = $this->items['callback_view'];
            unset($this->items['callback_view']);
        }

        $jss = "var grid_function_array = new Array();";
        $cs = Yii::app()->getClientScript();
        $cs->registerScript('cgridviewb', $jss, CClientScript::POS_BEGIN);

        $this->render('grid', array('cssClass' => $this->cssClass,
            'items' => $this->items,
            'url_view' => $url,
            'is_view' => $is_view,
            'callbackView' => $callbackView,
            'action' => $action,
            'is_action' => $is_action
        ));
    }
}