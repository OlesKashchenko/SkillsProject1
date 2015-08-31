<?php

class Product extends Eloquent
{

    use TranslateTrait;


    protected $table = 'products';


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive
}
