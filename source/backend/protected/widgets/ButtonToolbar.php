<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jimmy
 * Date: 10/26/13
 * Time: 4:09 PM
 * To change this template use File | Settings | File Templates.
 */

class ButtonToolbar extends CWidget {
    public $menu;
    public $visible = 1;

    public function run(){
        $this->render('buttonToolbar', array('menu'=>$this->menu, 'visible'=>$this->visible));
    }
}