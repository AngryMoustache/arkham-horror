<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable = [
        'player_id',
        'campaign_id',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class)->withPivot('quantity');
    }
}
