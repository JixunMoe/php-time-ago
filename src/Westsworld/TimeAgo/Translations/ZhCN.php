<?php

namespace Westsworld\TimeAgo\Translations;

use \Westsworld\TimeAgo\Language;

/**
 * Chinese translations
 */
class ZhCN extends Language
{
    public function __construct()
    {
        $this->setTranslations([
            'aboutOneDay' => "一天前",
            'aboutOneHour' => "一小时前",
            'aboutOneMonth' => "一个月前",
            'aboutOneYear' => "一年前",
            'days' => "%s 天前",
            'hours' => "%s 小时前",
            'lessThanAMinute' => "就在刚才",
            'lessThanOneHour' => "%s 分钟前",
            'months' => "%s 个月前",
            'oneMinute' => "一分钟前",
            'years' => "%s 年前"
        ]);
    }
}
