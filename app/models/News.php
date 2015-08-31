<?php

class News extends Eloquent implements iModelInterface
{
    use TranslateTrait,
        \Yaro\Jarboe\Helpers\Traits\ImageTrait;
        
    protected $table = 'news';

    public function catalog()
    {
        return $this->hasOne('Tree', 'id', 'id_catalog');
    }

    public function getSlug()
    {
        return Jarboe::urlify(strip_tags($this->title));
    } // end getSlug

    public function getUrl()
    {
        return geturl($this->getUri());
    } // end getUrl

    public function getUri()
    {
        return '/about/press/'. $this->getSlug() .'-'. $this->id;
    } // end getUri

    public function getDate($lang = null)
    {
        return Util::getDate($this->show_date, $lang);
    } // end getDate

    public function scopeActive($query)
    {
        return $query->where('active', 'like', '%'. App::getLocale() .'%');
    } // end scopeActive

    public function scopeDateFrom($query, $dateFrom)
    {
        if ($dateFrom) {
            return $query->where('show_date', '>', $dateFrom);
        }

        return $query;
    } // end scopeDateFrom

    public function scopeDateTo($query, $dateTo)
    {
        if ($dateTo) {
            return $query->where('show_date', '<', $dateTo);
        }

        return $query;
    } // end scopeDateTo

    public function scopeByCatalog($query, $idCatalog)
    {
        if ($idCatalog) {
            return $query->where('id_catalog', $idCatalog);
        }

        return $query;
    } // end scopeByCatalog

    public function scopeByYear($query, $year = '')
    {
        if ($year) {
            return $query->where('show_date', '>', $year .'-01-01 00:00:00')->where('show_date', '<', $year .'-12-31 23:59:59');
        }

        return $query;
    } // end scopeByCatalog

    public function scopeByCategories($query, $categories = array())
    {
        if ($categories) {
            $relatedCategoriesIds = DB::table('news2news_categories')->whereIn('id_category', $categories)->lists('id_new');

            if (!$relatedCategoriesIds) {
                return $query;
            }

            return $query->whereIn('id', $relatedCategoriesIds);
        }

        return $query;
    } // end scopeByCatalog

    public function scopeDesc($query)
    {
        return $query->orderBy('show_date', 'desc');
    } // end scopeDesc

    public function scopeMain($query)
    {
        return $query->where('is_show_main', 1);
    } // end scopeMain

    public function scopeOrderFixed($query)
    {
        return $query->orderBy('is_fixed_main', 'desc');
    } // end scopeOrderFixed

    public function isActive()
    {
        return !!preg_match('~'. preg_quote(App::getLocale()) .'~', $this->active);
    } // end isActive
}