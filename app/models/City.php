<?php

class City extends Eloquent
{

    use TranslateTrait;


    protected $table = 'cities';
    protected $fillable = array(
        'id',
        'id_region',
        'title',
        'title_ru',
        'title_en',
        'latitude',
        'longitude',
        'is_active',
        'created_at',
        'updated_at',
    );


    public function region()
    {
        return $this->hasOne('Region', 'id', 'id_region');
    } // end region

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive

    public function scopeByRegion($query, $idRegion)
    {
        if (!$idRegion) {
            return $query;
        }

        return $query->where('id_region', $idRegion);
    } // end scopeByRegion

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

    public function scopeSearchByTitle($query, $title)
    {
        $title = trim($title);

        if (!$title) {
            return $query;
        }

        // fixme: % ?
        return $query->where('title', 'like', $title)
            ->orWhere('title_ru', 'like', $title)
            ->orWhere('title_en', 'like', $title);
    } // end scopeSearchByTitle
}
