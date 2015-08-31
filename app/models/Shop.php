<?php

class Shop extends Eloquent
{

    use TranslateTrait;


    protected $table = 'shops';


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive
}
