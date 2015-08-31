<?php

class Region extends Eloquent
{

    use TranslateTrait;


    protected $table = 'regions';
    protected $fillable = array(
        'id',
        'title',
        'title_ru',
        'title_en',
        'is_active',
        'created_at',
        'updated_at',
    );


    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive

    public function scopeByTitle($query, $title, $lang = '')
    {
        $title = trim($title);

        if (!$title) {
            return $query;
        }

        if (!$lang) {
            $lang = App::getLocale();
        }

        $field = $lang == 'ua' ? 'title' : ($lang == 'ru' ? 'title_ru' : 'title_en');

        return $query->where($field, 'like', '%'. $title .'%');
    } // end scopeByTitle
}
