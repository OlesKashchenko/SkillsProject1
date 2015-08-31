<?php

class CardProgram extends Eloquent
{

    use \Yaro\Jarboe\Helpers\Traits\ImageTrait;
    use TranslateTrait;


    protected $table = 'cards_programs';


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive
}
