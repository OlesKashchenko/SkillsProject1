<?php

class NewsCategory extends Eloquent
{
    use TranslateTrait;
        
    protected $table = 'news_categories';

    /*
    public function files()
    {
        return $this->belongsToMany('Yaro\Jarboe\File', 'documents2j_files', 'id_document', 'id_file');
    }
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive
}