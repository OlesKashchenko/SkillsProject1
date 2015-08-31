<?php

class SliderItem extends Eloquent
{
    use TranslateTrait,
        \Yaro\Jarboe\Helpers\Traits\ImageTrait;

    protected $table = 'slider_items';

    public function scopeActive($query)
    {
        return $query->where('active', 'like', '%'. App::getLocale() .'%');
    } // end scopeActive

    public function scopeMain($query)
    {
        return $query->where('entity', 'main');
    } // end scopeMain

    public function scopeSmallBusiness($query)
    {
        return $query->where('entity', 'small');
    } // end scopeSmallBusiness

    public function scopeCorporateBusiness($query)
    {
        return $query->where('entity', 'corporate');
    } // end scopeCorporateBusiness
}