<?php


class BackendOfficesController extends Controller
{

    public function showOfficesImport()
    {
        return View::make('backend.offices.import');
    } // end showEditUser

    public function handleOfficesImport()
    {
        $file = Input::file('file');

        $folderPath = 'storage/offices/';
        $fileName = $file->getClientOriginalName();

        $file->move($folderPath, $fileName);

        $fileResults = Excel::load($folderPath . $fileName, function($reader) {})->get();

        $officesFromFile = array();
        foreach ($fileResults as $fileResult) {
            foreach ($fileResult as $characteristicName => $characteristicValue) {
                if (isset($fileResult['Номер'])) {
                    $officesFromFile[$fileResult['Номер']][$characteristicName] = $characteristicValue;
                }
            }
        }

        $translator = new GoogleTranslater();

        foreach ($officesFromFile as $officeFromFile) {
            $city = City::with(
                array('region' => function($query) use ($officeFromFile) {
                    $query->byTitle(trim($officeFromFile['Область']), 'ua');
                })
            )->byTitle(trim($officeFromFile['Город']), 'ua')->first();

            // create city if it doesn't exist
            if (!$city) {
                $region = Region::byTitle(trim($officeFromFile['Область']), 'ua')->first();

                // get geo coordinates from Google API
                $geoAddress = 'Україна, '. $region->title .' обл., м. '. trim($officeFromFile['Город']);
                $geoResult = json_decode(
                    file_get_contents(
                        'http://maps.googleapis.com/maps/api/geocode/json?'.
                        http_build_query(array('address' => $geoAddress, 'sensor' => true))
                    ), true
                );

                $geoLatitude = $geoResult['results'][0]['geometry']['location']['lat'];
                $geoLongitude = $geoResult['results'][0]['geometry']['location']['lng'];

                // create city entity
                $city = City::create(array(
                    'id_region' => $region->id,
                    'title'     => trim($officeFromFile['Город']),
                    'title_ru'  => trim($officeFromFile['Город (рус)']),
                    'title_en'  => $translator->translateText(trim($officeFromFile['Город']), "uk", "en"),
                    'latitude'  => isset($geoLatitude) && $geoLatitude ? $geoLatitude : '',
                    'longitude' => isset($geoLongitude) && $geoLongitude ? $geoLongitude : '',
                    'is_active' => 1,
                ));

                if (!$city) {
                    return Response::json(
                        array('status' => false)
                    );
                }
            }

            $officeData = array(
                'id_city'                       => $city->id,
                'number'                        => trim($officeFromFile['Номер']),
                'address'                       => trim($officeFromFile['Адрес']),
                'address_ru'                    => trim($officeFromFile['Адрес (рус)']),
                'address_en'                    => $translator->translateText(trim($officeFromFile['Адрес']), "uk", "en") ?: '',
                'title'                         => trim($officeFromFile['Название']),
                'title_ru'                      => trim($officeFromFile['Название (рус)']),
                'title_en'                      => $translator->translateText(trim($officeFromFile['Название']), "uk", "en") ?: '',
                'description'                   => trim($officeFromFile['Описание']),
                'description_ru'                => trim($officeFromFile['Описание (рус)']),
                'description_en'                => $translator->translateText(trim($officeFromFile['Описание']), "uk", "en") ?: '',
                'metro'                         => trim($officeFromFile['Станции метро']),
                'metro_ru'                      => trim($officeFromFile['Станции метро (рус)']),
                'metro_en'                      => $translator->translateText(trim($officeFromFile['Станции метро']), "uk", "en") ?: '',
                'latitude'                      => trim($officeFromFile['Latitude']),
                'longitude'                     => trim($officeFromFile['Longitude']),
                'phones'                        => trim($officeFromFile['Телефоны']),
                'director'                      => trim($officeFromFile['Директор']),
                'director_ru'                   => trim($officeFromFile['Директор (рус)']),
                'director_en'                   => $translator->translateText(trim($officeFromFile['Директор']), "uk", "en") ?: '',
                'services'                      => trim($officeFromFile['Услуги']),
                'services_ru'                   => trim($officeFromFile['Услуги (рус)']),
                'services_en'                   => $translator->translateText(trim($officeFromFile['Услуги']), "uk", "en") ?: '',
                'type'                          => str_replace(';', ',', trim($officeFromFile['Тип'])),
                'atm_type'                      => str_replace(';', ',', trim($officeFromFile['Тип банкомата'])),
                'atm_subtype'                   => str_replace(';', ',', trim($officeFromFile['Подтип банкомата'])),
                'is_active'                     => trim($officeFromFile['Активность']) == 'Да' ? 1 : 0,
                'schedule'                      => trim($officeFromFile['Режим работы']),
                'schedule_ru'                   => $translator->translateText(trim($officeFromFile['Режим работы']), "uk", "ru") ?: '',
                'schedule_en'                   => $translator->translateText(trim($officeFromFile['Режим работы']), "uk", "en") ?: '',
                'schedule_operations'           => trim($officeFromFile['Операционная касса']),
                'schedule_operations_ru'        => $translator->translateText(trim($officeFromFile['Операционная касса']), "uk", "ru") ?: '',
                'schedule_operations_en'        => $translator->translateText(trim($officeFromFile['Операционная касса']), "uk", "en") ?: '',
                'schedule_operations_post'      => trim($officeFromFile['Послеоперационная касса']),
                'schedule_operations_post_ru'   => $translator->translateText(trim($officeFromFile['Послеоперационная касса']), "uk", "ru") ?: '',
                'schedule_operations_post_en'   => $translator->translateText(trim($officeFromFile['Послеоперационная касса']), "uk", "en") ?: '',
            );

            $existedOffice = Office::byNumber(trim($officeFromFile['Номер']))->first();
            if (!$existedOffice) {
                Office::create($officeData);
            } else {
                Office::where('number', trim($officeFromFile['Номер']))->update($officeData);
            }
        }

        return Response::json(
            array('status' => true)
        );
    } // end handleOfficesImport
}
