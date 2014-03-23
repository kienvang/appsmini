<?php
/**
 * Created by Kenny.
 * Date: 10/30/13
 * Time: 10:27 PM
 * To change this template use File | Settings | File Templates.
 */

class ActiveForm extends CWidget {
    public $items;

    public function run(){
        $this->items = array_merge($this->items, array(
            'enableAjaxValidation'=>false,
            'clientOptions'=> array(
                'validateOnSubmit'=>true,
            ),
            'enableClientValidation'=>true,
            'htmlOptions' => array(
                'class' => 'form-horizontal'
            )
        ));
    }
}