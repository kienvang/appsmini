<?php
Yii::import('zii.widgets.jui.CJuiAutoComplete');

class EJuiAutoCompleteExt extends CJuiAutoComplete {
    public function run()
    {

        $reinitAfterAjaxUpdate = true;
        if(isset($this->options['reinitAfterAjaxUpdate'])) {
            $reinitAfterAjaxUpdate = $this->options['reinitAfterAjaxUpdate'];
            unset($this->options['reinitAfterAjaxUpdate']);
        };

        $reinitAfterAjaxUpdate = true;

        parent::run();

        if($reinitAfterAjaxUpdate) {

            // some things needed from parent have to be done here again
            list($name,$id)=$this->resolveNameID();

            if($this->sourceUrl!==null)
                $this->options['source']=CHtml::normalizeUrl($this->sourceUrl);
            else
                $this->options['source']=$this->source;

            $options=CJavaScript::encode($this->options);


            // global ajaxSuccess event is used here
            // check if autocomplete is enabled for selector
            // in case it is not initialized this will be done now
            $js = "$('div#content').ajaxSuccess(
                function(event,request,settings){
                    var init = (!(!($('#{$id}'))) && ($('#{$id}').autocomplete( 'option', 'disabled' ) == false));
                    if(!init) {
                        alert('aaa');
                        jQuery('#{$id}').autocomplete($options);
                    };
                }
            );";

            //$jss = "function afterGridUpdateAjax(){jQuery('#{$id}').autocomplete($options);}";
            $jss = "if (grid_function_array != undefined) grid_function_array.push(function() { jQuery('#{$id}').autocomplete($options); })";

            $cs = Yii::app()->getClientScript();
            $cs->registerScript(__CLASS__.'#'.$id.'_ajaxSuccess', $jss, CClientScript::POS_READY);

        }

    }

}