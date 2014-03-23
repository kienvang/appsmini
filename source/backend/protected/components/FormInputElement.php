<?php

class FormInputElement extends CFormInputElement {

    public $layout="{label}<div class='controls'>{input}\n{hint}\n{error}</div>";

    public function renderLabel()
    {
        $options = array(
            'label'=>$this->getLabel(),
            'required'=>$this->getRequired(),
            'class' => 'control-label'
        );

        if(!empty($this->attributes['id']))
        {
            $options['for'] = $this->attributes['id'];
        }
        return CHtml::activeLabel($this->getParent()->getModel(), $this->name, $options);
    }

    public function renderBirthday() {
        if(isset(self::$coreTypes[$this->type]))
        {
            $output  = $this->renderLabel();
            $output .= '<div class="controls">';
            $output .= CHtml::activeDropDownList($this->getParent()->getModel(), $this->name . '_day', ShopUtil::getDays(), $this->attributes);
            $output .= CHtml::activeDropDownList($this->getParent()->getModel(), $this->name . '_month', ShopUtil::getMonths(), $this->attributes);
            $output .= CHtml::activeDropDownList($this->getParent()->getModel(), $this->name . '_year', ShopUtil::getYears(), $this->attributes);
            $output .= '</div>';
            return $output;
        }
        else
        {
            $attributes=$this->attributes;
            $attributes['model']=$this->getParent()->getModel();
            $attributes['attribute']=$this->name;
            ob_start();
            $this->getParent()->getOwner()->widget($this->type, $attributes);
            return ob_get_clean();
        }
    }
}