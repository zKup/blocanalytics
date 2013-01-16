<?php


class blocanalytics extends UnModule
{
    const ANALYTICS_CODE = 'analytics_code';

    function __construct()
    {
        $this->nom = 'Module Google Analytics';
        $this->module = 'blocanalytics';
        $this->version = '1.0';
        $this->groupe = 'statistiques';
        $this->configs = array(
            self::ANALYTICS_CODE => array('', 'Votre code HTML Google Analytics',UnModule::TEXTAREA,'width:400px;height:200px')
        );
    }

    public function installer()
    {
        $this->registerHook('footer');
    }

    public function desinstaller()
    {
    }

    public function activer()
    {
    }

    public function desactiver()
    {
    }

    public function hookFooter()
    {
        $code = $this->config(self::ANALYTICS_CODE);
        if ( $code ) {
            add_vars(self::ANALYTICS_CODE, $code);
            return $this->template('blocanalytics.tpl');
        }
        return '';
    }
}
