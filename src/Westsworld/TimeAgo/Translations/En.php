<?php

namespace Westsworld\TimeAgo\Translations;

use \Westsworld\TimeAgo\Language;

/**
 * English translations
 */
class En extends Language
{
    public function __construct()
    {
        $this->setTranslations([
            'aboutOneDay' => "one day ago",
            'aboutOneHour' => "an hour ago",
            'aboutOneMonth' => "a month ago",
            'aboutOneYear' => "a year ago",
            'days' => "%s days ago",
            'hours' => "%s hours ago",
            'lessThanAMinute' => "just now",
            'lessThanOneHour' => "%s minutes ago",
            'months' => "%s months ago",
            'oneMinute' => "a minute ago",
            'years' => "%s years ago",
        ]);
    }
}
