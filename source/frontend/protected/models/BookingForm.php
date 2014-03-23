<?php

class BookingForm extends CFormModel {
    public $depart;
    public $destination;
    public $depart_date;
    public $des_date;
    public $adults = 1;
    public $children = 0;
    public $infants = 0;

    public function rules(){
        return array(
            array('depart, destination, depart_date, des_date, adults, children, infants', 'safe')
        );
    }

    public function attributeLabels(){
        return array(
            'depart' => 'Điểm đi',
            'destination' => 'Điểm đến',
            'depart_date' => 'Ngày đi',
            'des_date' => 'Ngày về'
        );
    }
}