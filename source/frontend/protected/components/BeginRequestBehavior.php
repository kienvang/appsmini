<?php

Yii::import('backend.components.Util');

class BeginRequestBehavior extends CBehavior
{
    public function attach($owner)
    {
        $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
    }

    public function handleBeginRequest()
    {
        $request = Yii::app()->request;
        $refer = $request->getUrlReferrer();
        if (isset($refer)){
            $domain = $request->getServerName();
            $check = explode($domain, $refer);
            if (count($check) == 1){
                $cookie_setting = json_decode(SystemSetting::model()->getValue('cookie'));
                $data = array(
                    'value'             => $refer,
                    'valueDefault'      => serialize(FLoginForm::COOKIE_HTTP_REFER),
                    'name'              => FLoginForm::COOKIE_HTTP_REFER
                );
                Util::writeCookie($data, $cookie_setting->key);

                $data = array(
                    'value'             => Yii::app()->request->getUrl(),
                    'valueDefault'      => serialize(FLoginForm::COOKIE_HTTP_RAW),
                    'name'              => FLoginForm::COOKIE_HTTP_RAW
                );
                Util::writeCookie($data, $cookie_setting->key);
            }
        }
    }
}