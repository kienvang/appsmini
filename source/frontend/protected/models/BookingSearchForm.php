<?php
/**
 * Created by Kenny.
 * Date: 3/8/14
 * Time: 8:10 AM
 * To change this template use File | Settings | File Templates.
 */

class BookingSearchForm extends CFormModel {
    public $session_key;

    public function rules(){
        return array(
            array('session_key', 'safe')
        );
    }

    public function attributeLabels(){
        return array(
            'session_key' => 'Session Key'
        );
    }

    public function getSearch(){
        $ss = SessionBooking::model()->findByAttributes(array('session_key' => $this->session_key));

        $result = array('depart' => null, 'destination' => null);

        if ($ss){
            $booking = new BookingForm();
            $data_step = json_decode($ss->data_step, true);
            $booking->attributes = $data_step[SessionBooking::STEP_SEARCH];

            $data = array(
                'adults' => $booking->adults,
                'children' => $booking->children,
                'infants' => $booking->infants,
                'fareInfo' => array(
                    array(
                        'departureDate' => date('Y-m-d', Util::convertDate($booking->depart_date)) . 'T00:00:00+0000',
                        'originCode' => $booking->depart,
                        'destinationCode' => $booking->destination
                    ),
                    array(
                        'departureDate' => date('Y-m-d', Util::convertDate($booking->des_date)) . 'T00:00:00+0000',
                        'originCode' => $booking->destination,
                        'destinationCode' => $booking->depart
                    ),
                )
            );

            $search = FApi::instant()->getSearch($data);
            $receive = array('depart' => null, 'destination' => null);

            if (!empty($search)){
                $location = Location::model()->getArray();
                foreach ($search as $code => $provider){
                    foreach ($provider as $s){
                        $fl = "";
                        $temp = array();

                        if ($s['fareInfo']['originCode'] == $booking->depart && $s['fareInfo']['destinationCode'] == $booking->destination){
                            $fl = 'depart';
                        }else{
                            $fl = 'destination';
                        }

                        $receive[$fl][] = $s;

                        $temp['depart']['date'] = date('d/m/Y H:m', Util::convertDateTime($s['fareInfo']['departureDate']));
                        $temp['depart']['time'] = date('H:m', Util::convertDateTime($s['fareInfo']['departureDate']));
                        $temp['depart']['code'] = $location[$s['fareInfo']['originCode']];

                        $temp['destination']['date'] = date('d/m/Y H:m', Util::convertDateTime($s['fareInfo']['arrivalDate']));
                        $temp['destination']['time'] = date('H:m', Util::convertDateTime($s['fareInfo']['arrivalDate']));
                        $temp['destination']['code'] = $location[$s['fareInfo']['destinationCode']];

                        $temp['flightCode'] = $s['fareInfo']['flightCode'];
                        $temp['code'] = $code;

                        $temp['status'] = 0;
                        if (isset($s['priceOptions'])){
                            $temp['status'] = 1;
                            $price = 0;

                            foreach ($s['priceOptions'] as $p){
                                if ($p['airPriceInfo']['total'] > $price)
                                    $price = $p['airPriceInfo']['total'];
                            }

                            $temp['price'] = $price;

                            $result[$fl][] = $temp;
                        }
                    }
                }

                $ss->updateReceive(SessionBooking::STEP_SEARCH, $receive);

            }
        }

        return $result;
    }
}