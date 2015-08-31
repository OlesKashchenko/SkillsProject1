<?php

class Occupation extends Eloquent
{

    use TranslateTrait;


    protected $table = 'occupations';


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive
}