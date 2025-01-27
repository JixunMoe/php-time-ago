<?php

namespace Westsworld\TimeAgo\Translations;

use \Westsworld\TimeAgo\Language;

/**
 * Iranian translations
 */
class Fa extends Language
{
    public function __construct()
    {
        $this->setTranslations([
            'aboutOneDay' => "1 روز قبل",
            'aboutOneHour' => "حدود 1 ساعت قبل",
            'aboutOneMonth' => "حدود 1 ماه قبل",
            'aboutOneYear' => "حدود 1 سال قبل",
            'days' => "%s روز قبل",
            'hours' => "%s ساعت قبل",
            'lessThanAMinute' => "کمتر از 1 دقیقه قبل",
            'lessThanOneHour' => "%s دقیقه قبل",
            'months' => "%sماه قبل",
            'oneMinute' => "1 دقیقه قبل",
            'years' => "بیش از %s سال قبل",
            'never' => 'هرگز'
        ]);
    }
}
