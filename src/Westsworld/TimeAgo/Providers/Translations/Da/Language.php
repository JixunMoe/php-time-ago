<?php

namespace Westsworld\TimeAgo\Translations\Da;

/**
 * Danish translations
 */
class Language extends Westsworld\TimeAgo\Translations\Language
{
    public function __construct()
    {
        $this->setTranslations([
            'aboutOneDay' => "1 dag siden",
            'aboutOneHour' => "cirka 1 time siden",
            'aboutOneMonth' => "cirka 1 måned siden",
            'aboutOneYear' => "cirka 1 år siden",
            'days' => "%s dage siden",
            'hours' => "%s timer siden",
            'lessThanAMinute' => "mindre end et minut siden",
            'lessThanOneHour' => "%s minutter siden",
            'months' => "%s måneder siden",
            'oneMinute' => "1 minut siden",
            'years' => "over %s år siden"
        ]);
    }
}
