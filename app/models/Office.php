<?php

class Office extends Eloquent
{

    use TranslateTrait;


    protected $table = 'offices';
    protected $fillable = array(
        'id',
        'id_city',
        'number',
        'address',
        'address_ru',
        'address_en',
        'title',
        'title_ru',
        'title_en',
        'description',
        'description_ru',
        'description_en',
        'metro',
        'metro_ru',
        'metro_en',
        'latitude',
        'longitude',
        'phones',
        'services',
        'services_ru',
        'services_en',
        'director',
        'director_ru',
        'director_en',
        'type',
        'atm_type',
        'atm_subtype',
        'is_active',
        'created_at',
        'updated_at',
    );


    public function city()
    {
        return $this->hasOne('City', 'id', 'id_city');
    } // end city

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    } // end scopeActive

    public function scopeLegal($query)
    {
        return $query->where('number', 0);
    } // end scopeLegalAddress

    public function scopeByCity($query, $idCity)
    {
        if (!$idCity) {
            return $query;
        }

        if (is_array($idCity)) {
            return $query->whereIn('id_city', $idCity);
        } else {
            return $query->where('id_city', $idCity);
        }
    } // end scopeByCity

    public function scopeByType($query, $types)
    {
        return $query->where('type', 'like', '%'. $types .'%');
    } // end scopeByType

    public function scopeByAtmType($query, $types = array())
    {
        if (!$types) {
            return $query;
        }

        $types = array_map('trim', $types);
        $types = implode(',', $types);

        return $query->where('atm_type', 'like', '%'. $types .'%');
    } // end scopeByAtmType

    public function scopeByAtmSubtype($query, $types = array())
    {
        if (!$types) {
            return $query;
        }

        $types = array_map('trim', $types);
        $types = implode(',', $types);

        return $query->where('atm_subtype', 'like', '%'. $types .'%');
    } // end scopeByAtmSubtype

    public function scopeByNumber($query, $number)
    {
        if (!$number) {
            return $query;
        }

        return $query->where('number', $number);
    } // end scopeByNumber

    public function scopeSearchByMetro($query, $title)
    {
        $title = trim($title);

        if (!$title) {
            return $query;
        }

        // fixme: % ?
        return $query->where('metro', 'like', $title)
            ->orWhere('metro_ru', 'like', $title)
            ->orWhere('metro_en', 'like', $title);
    } // end scopeSearchByMetro

    public function scopeSearchByAddress($query, $address)
    {
        $address = trim($address);

        if (!$address) {
            return $query;
        }

        // fixme: % ?
        return $query->where('address', 'like', $address)
            ->orWhere('address_ru', 'like', $address)
            ->orWhere('address_en', 'like', $address)
            ->orWhere('title', 'like', $address)
            ->orWhere('title_ru', 'like', $address)
            ->orWhere('title_en', 'like', $address)
            ->orWhere('description', 'like', $address)
            ->orWhere('description_ru', 'like', $address)
            ->orWhere('description_en', 'like', $address);
    } // end scopeSearchByAddress

    public function scopeBySearchPhrase($query, $phrase)
    {
        $phrase = trim($phrase);

        if (!$phrase) {
            return $query;
        }

        // by city name
        $citiesIds = City::active()->searchByTitle($phrase)->lists('id');
        if ($citiesIds) {
            return $query->byCity($citiesIds);
        }

        // by metro station
        $officesIds = Office::active()->searchByMetro($phrase)->lists('id');
        if ($officesIds) {
            return $query->whereIn('id', $officesIds);
        }

        // by address
        return $query->byAddress($phrase);
    } // end scopeBySearchPhrase

    public function scopeFilter($query, $params = array())
    {
        if (!$params) {
            return $query;
        }

		$type = trim($params['type']);
		if ($type) {
            $query->byType($type);
		}

		if ($type == 'atm') {
			$atmTypes = Input::get('atm_types');
			$atmSubtypes = Input::get('atm_subtypes');

			if ($atmTypes) {
                $query->byAtmType($atmTypes);

                if (in_array('alfa', $atmTypes) && $atmSubtypes) {
                    $query->byAtmSubType($atmSubtypes);
                }
			}
		}

        $search = trim($params['search']);
        if ($search) {
            $query->bySearchPhrase($search);
        }

        return $query;
    } // end scopeFilter

    public static function getMap($offices)
    {
        $map = array();
        foreach ($offices as $office) {
            $map[$office->id] = array(
                'id'                        => $office->id,
                'number'                    => $office->number,
                'title'                     => $office->t('title'),
                'city'                      => $office->city ? $office->city->t('title') : '',
                'address'                   => $office->t('address'),
                'latitude'                  => $office->latitude,
                'longitude'                 => $office->longitude,
                'description'               => $office->t('description'),
                'director'                  => $office->t('director'),
                'schedule'                  => $office->t('schedule'),
                'schedule_operations'       => $office->t('schedule_operations'),
                'schedule_operations_post'  => $office->t('schedule_operations_post'),
                'icon'                      => asset('/images/gmarker_default.png'),
            );

            $phones = explode(';', $office->phones);
            foreach ($phones as $phone) {
                $map[$office->id]['phones'][] = trim($phone);
            }

            $metros = explode(';', $office->t('metro'));
            foreach ($metros as $metro) {
                $map[$office->id]['metro'][] = trim($metro);
            }

            $services = explode(';', $office->t('services'));
            foreach ($services as $service) {
                $map[$office->id]['services'][] = trim($service);
            }

            $types = explode(',', $office->type);
            foreach ($types as $type) {
                $map[$office->id]['types'][] = trim($type);
            }

            $atmTypes = explode(',', $office->atm_type);
            foreach ($atmTypes as $atmType) {
                $map[$office->id]['atm_types'][] = trim($atmType);
            }

            $atmSubTypes = explode(',', $office->atm_subtype);
            foreach ($atmSubTypes as $atmSubType) {
                $map[$office->id]['atm_subtypes'][] = trim($atmSubType);
            }
        }

        return array_values($map);
    } // end getMap
}
