<?php

class Util
{

    public static $registry = null;

    public static function getDate($date, $isOnlyDate = false)
    {
        $monthes = array(
            'ua' => array(
                1 => 'Січня', 2 => 'Лютого', 3 => 'Березня', 4 => 'Квітня',
                5 => 'Травня', 6 => 'Червня', 7 => 'Липня', 8 => 'Серпня',
                9 => 'Вересня', 10 => 'Жовтня', 11 => 'Листопада', 12 => 'Грудня'
            ),
            'ru' => array(
                1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
                5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
                9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
            ),
            'en' => array(
                1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
            )
        );

        $resultDate = date('d ', strtotime($date)) .
            $monthes[App::getLocale()][(date('n', strtotime($date)))] .
            date(' Y', strtotime($date));

        if (!$isOnlyDate) {
            $resultDate  = $resultDate . date(' - H:i', strtotime($date));
        }

        return $resultDate;
    } // end getDate

    public static function getDateSegments($date)
    {
        $monthes = array(
            'ua' => array(
                1 => 'Січ', 2 => 'Лют', 3 => 'Бер', 4 => 'Кві',
                5 => 'Тра', 6 => 'Чер', 7 => 'Лип', 8 => 'Сер',
                9 => 'Вер', 10 => 'Жов', 11 => 'Лис', 12 => 'Гру'
            ),
            'ru' => array(
                1 => 'Янв', 2 => 'Фев', 3 => 'Мар', 4 => 'Апр',
                5 => 'Мая', 6 => 'Июн', 7 => 'Июл', 8 => 'Авг',
                9 => 'Сен', 10 => 'Окт', 11 => 'Ноя', 12 => 'Дек'
            ),
            'en' => array(
                1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
                5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
                9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
            )
        );

        return array(
            'day'   => date('d ', strtotime($date)),
            'month' => $monthes[App::getLocale()][(date('n', strtotime($date)))],
            'year'  => date('Y', strtotime($date))
        );
    } // end getDateSegments

    public static function getMonth($date, $isCase = false)
    {
        $monthes = array(
            'ru' => array(
                1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
                5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
                9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
            ),
            'en' => array(
                1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
            )
        );
        
        if ($isCase) {
            $monthes['ru'] = array(
                1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
                5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
                9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
            );
        }

        return $monthes[App::getLocale()][(date('n', strtotime($date)))];
    } // end getMonth

    public static function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' gb';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' mb';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024) . ' kb';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    } // end formatSizeUnits
}
