<?php

namespace Westsworld\TimeAgo\Translations;

use \Westsworld\TimeAgo\Language;
use \Westsworld\TimeAgo\Translations\Zh_CN;

class TranslationLoader {
    private static $dicts = null;

    public static function loadLanguage(string $str, $fallback = 'en'): Language
    {
        if (is_null(self::$dicts)) {
            self::loadLangDict();
        }

        $lower = strtolower(trim($str));
        $country = substr($lower, 0, 2);
        $dict = null;
        if ($country === 'zh') {
            $dialouge = substr($lower, 3);
            if ($dialouge === 'tw') {
                $dict = ZhTW::class;
            } else {
                $dict = ZhCN::class;
            }
        } else {
            if (array_key_exists($country, self::$dicts)) {
                $dict = self::$dicts[$country];
            } elseif (array_key_exists($fallback, self::$dicts)) {
                $dict = self::$dicts[$fallback];
            } else {
                $dict = En::class;
            }
        }

        return new $dict();
    }

    private static function loadLangDict()
    {
        self::$dicts = [
            'ar' => Ar::class,
            'bg' => Bg::class,
            'ca' => Ca::class,
            'cs' => Cs::class,
            'da' => Da::class,
            'de' => De::class,
            'en' => En::class,
            'es' => Es::class,
            'fa' => Fa::class,
            'fi' => Fi::class,
            'fr' => Fr::class,
            'ge' => Ge::class,
            'hu' => Hu::class,
            'ja' => Ja::class,
            'ko' => Ko::class,
            'lv' => Lv::class,
            'nl' => Nl::class,
            'pl' => Pl::class,
            'pt' => Pt::class,
            'ru' => Ru::class,
            'sk' => Sk::class,
            'sv' => Sv::class,
            'th' => Th::class,
            'tr' => Tr::class,
            'uk' => Uk::class,
            'vi' => Vi::class,
            'zn' => Zh_CN::class,
        ];
    }
}