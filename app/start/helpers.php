<?php

if (!function_exists('geturl'))
{
    function geturl($url, $attributes = array())
    {
        if (!$url) {
            $url = '/';
        }

        return LaravelLocalization::getLocalizedURL(App::getLocale(), $url, $attributes);
    } // end geturl
}
