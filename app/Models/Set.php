<?php

namespace App\Models;

use App\Http\Clients\ArkhamDB;
use App\Jobs\PullCardFromSet;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $fillable = [
        'name',
        'code',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public static function booted()
    {
        static::saving(function ($set) {
            $cards = ArkhamDB::set($set->code);

            $set->name ??= $cards->first()['pack_name'];

            $cards->each(function (array $card) {
                PullCardFromSet::dispatch($card);
            });

            return $set;
        });
    }
}
