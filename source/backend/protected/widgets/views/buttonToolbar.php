<?php if($visible) { ?>
<div class="btn-toolbar">
    <div class="btn-toolbar">
    <?php foreach($menu as $item){
            if(isset($item['linkOptions']) && !isset($item['linkOptions']['class']))
            {
                $item['linkOptions'] = array_merge($item['linkOptions'], array('class'=>'btn btn-blue'));
            }
            if(!isset($item['iconBootstrap'])){
                $item['iconBootstrap'] = 'icon-plus';
            }
            $label=isset($item['iconBootstrap']) ? '<i class="'.$item['iconBootstrap'].'"></i>'.$item['label'] : $item['label'];
            echo CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array('class'=>'btn btn-blue'));
    } ?>
    </div>
</div>
<?php } ?>