<?php
Yii::import('zii.widgets.CMenu');
class BootstrapMenu extends CMenu {
	protected function renderMenuItem($item)
	{
		if(isset($item['url']))
		{
			$label=$this->linkLabelWrapper===null ? $item['label'] : CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
            $tag=isset($item['iconTag']) ? $item['iconTag'] : 'i';
            $label=isset($item['iconBootstrap']) ? '<'.$tag.' class="'.$item['iconBootstrap'].'"></'.$tag.'>'.$label : $label;
			return CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
		}
		else
			return CHtml::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
	}
}
?>