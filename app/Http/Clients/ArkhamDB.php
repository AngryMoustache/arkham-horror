<?php

namespace App\Http\Clients;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ArkhamDB
{
    private static string $url = 'https://arkhamdb.com/api/public';

    public static function packs()
    {
        return Cache::rememberForever('arkhamdb.packs', function () {
            return Http::get(self::$url . '/packs')->body();
        });
    }

    public static function set($code)
    {
        return Cache::rememberForever("arkhamdb.set.{$code}", function () use ($code) {
            return Http::get(self::$url . "/cards/{$code}")->collect();
        });
    }

    public static function card($code)
    {
        return Cache::rememberForever("arkhamdb.card.{$code}", function () use ($code) {
            return Http::get(self::$url . "/card/{$code}")->collect();
        });
    }

    public static function flush()
    {
        Cache::flush();
    }
}
