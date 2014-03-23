<?php

class Form extends CForm {

    public $inputElementClass='FormInputElement';

    public function renderElement($element)
    {
        if(is_string($element))
        {
            if(($e=$this[$element])===null && ($e=$this->getButtons()->itemAt($element))===null)
                return $element;
            else
                $element=$e;
        }
        if($element->getVisible())
        {
            if($element instanceof CFormInputElement)
            {
                if($element->name==='birthday')
                    return "<div class=\"control-group field_{$element->name}\">\n".$element->renderBirthday()."</div>\n";
                if($element->type==='hidden')
                    return "<div style=\"visibility:hidden\">\n".$element->render()."</div>\n";
                return "<div class=\"control-group field_{$element->name}\">\n".$element->render()."</div>\n";
            }
            elseif($element instanceof CFormButtonElement)
                return $element->render()."\n";
            else
                return $element->render();
        }
        return '';
    }

    public function renderButtons()
    {
        $output='';
        foreach($this->getButtons() as $button)
            $output.=$this->renderElement($button);
        return $output!=='' ? "<div class=\"controls\">".$output."</div>\n" : '';
    }

    public function renderBody()
    {
        $output='';
        if($this->title!==null)
        {
            if($this->getParent() instanceof self)
            {
                $attributes=$this->attributes;
                unset($attributes['name'],$attributes['type']);
                $output=CHtml::openTag('fieldset', $attributes)."<legend>".$this->title."</legend>\n";
            }
            else
                $output="<fieldset>\n<legend>".$this->title."</legend>\n";
        }

        if($this->description!==null)
            $output.="<div class=\"description\">\n".$this->description."</div>\n";

        if($this->showErrorSummary && ($model=$this->getModel(false))!==null)
            $output.=$this->getActiveFormWidget()->errorSummary($model)."\n";

        $output.=$this->renderElements()."\n".$this->renderButtons()."\n";

        if($this->title!==null)
            $output.="</fieldset>\n";

        return $output;
    }

    /**
     * Renders the form.
     * The default implementation simply calls {@link renderBegin}, {@link renderBody} and {@link renderEnd}.
     * @return string the rendering result
     */
    public function render()
    {
        if(isset($this->attributes['type']) && $this->attributes['type'] == 'form') {
            $class = isset($this->attributes['options']['class']) ? $this->attributes['options']['class'] : '';
            return "<div class='$class'>" . $this->renderBegin() . $this->renderBody() . $this->renderEnd() . "</div>";
        }
        return $this->renderBegin() . $this->renderBody() . $this->renderEnd();
    }
}