<?php
Yii::import('zii.widgets.CMenu', true);

class ActiveMenu extends CMenu
{
    public function init()
    {
        $i=0;
        $this->items[$i++]=array(
            'url'=>array('//site/index'),
            'template'=>'<a href="'.Yii::app()->createUrl('//site/index').'" class="nav-home">Trang chủ</a>',
        );

        $sections=CmsSection::model()->getAll();

        foreach($sections as $section)
        {
            unset($category_items);
            $category_items=array();
            $categories=CmsCategory::model()->getAllBySection($section->id);
            foreach($categories as $category)
                $category_items[]=array('label'=>$category->title,'url'=>array('//article/category','slug'=>$category->slug));
            $this->items[$i++]=array(
                'template'=>$this->getNavLink($section),
                'items'=>$category_items,
            );
        }
        $gallery_type = GalleryType::model()->getHome();
        $list_album =array();
        foreach($gallery_type as $album){
            $list_album[]=array('label'=>$album->title,'url'=>array('//gallery/album','slug'=>$album->slug));
        }
        $this->items[$i++]=array(
            'template'=>'<a href="'.Yii::app()->createUrl('//gallery').'" class="nav-gallery">Thư viện</a>',
            'items'=>$list_album,
        );
        $this->items[$i++]=array(
            'template'=>'<a href="'.Yii::app()->createUrl('//forum').'" class="nav-forum">Diễn đàn</a>',
        );
        ksort($this->items);
        parent::init();
    }

    private function getNavLink($section)
    {
        switch($section->slug)
        {
            case 'tin-tuc':
                return '<a href="'.Yii::app()->createUrl('//article/category',array('slug'=>'tin-moi')).'" class="nav-news">'.$section->title.'</a>';
                break;
            case 'gioi-thieu':
                return '<a href="'.Yii::app()->createUrl('//article/category',array('slug'=>'boi-canh')).'" class="nav-intro">'.$section->title.'</a>';
                break;
            case 'cam-nang':
                return '<a href="'.Yii::app()->createUrl('//article/category',array('slug'=>'tan-thu')).'" class="nav-guide">'.$section->title.'</a>';
                break;
        }
        return null;
    }

}