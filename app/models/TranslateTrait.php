<?php

trait TranslateTrait 
{
    public function translate($ident)
    {
        if (App::getLocale() == 'ru') {
            $ident .= '_ru';
        } else if (App::getLocale() == 'ua') {
            $ident .= '';
        } else {
            $ident .= '_en';
        }
        
        return $this->$ident;
    } // end translate
    
    public function t($ident)
    {
        return $this->translate($ident);
    } // end translate
}
