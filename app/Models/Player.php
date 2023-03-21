<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
    ];

    public function decks()
    {
        return $this->hasMany(Deck::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class)
            ->using(Pivot\CampaignPlayer::class);
    }

    public static function booted()
    {
        self::addGlobalScope('sorted', function ($query) {
            $query->orderBy('name');
        });
    }
}
