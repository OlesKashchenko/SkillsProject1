<?php

class Area extends Eloquent
{

    use TranslateTrait;


    protected $table = 'areas';
    protected $fillable = array(
        'id',
        'title',
        'title_ru',
        'title_en',
        'created_at',
        'updated_at',
    );
}
