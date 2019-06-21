<?php

namespace Westsworld\TimeAgo\Translations;

use \Westsworld\TimeAgo\Language;

/**
 * Translations
 */
class ZhTW extends Language
{
    public function __construct()
    {
        $this->setTranslations([
            'aboutOneDay' => "一天前",
            'aboutOneHour' => "一小時前",
            'aboutOneMonth' => "一個月前",
            'aboutOneYear' => "一年前",
            'days' => "%s 天前",
            'hours' => "%s 小時前",
            'lessThanAMinute' => "就在剛才",
            'lessThanOneHour' => "%s 分鐘前",
            'months' => "%s 個月前",
            'oneMinute' => "一分鐘前",
            'years' => "%s 年前",
        ]);
    }
}
