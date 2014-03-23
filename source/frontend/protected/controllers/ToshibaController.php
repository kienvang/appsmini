<?php
/**
 * Created by Kenny.
 * Date: 3/22/14
 * Time: 7:34 PM
 * To change this template use File | Settings | File Templates.
 */

class ToshibaController extends Controller {
    public function init(){
        Yii::app()->theme = 'toshiba';
    }

    public function actionIndex(){
        $this->layout = "home";
        $this->render('index');
    }

    public function actionInfor(){
        $this->render('infor');
    }
}