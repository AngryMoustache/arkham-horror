<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'set_id',
        'information',
    ];

    public $casts = [
        'information' => 'json',
    ];

    public $with = [
        'set',
        'players',
    ];

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class)
            ->withPivot(['investigator_id', 'mental_trauma', 'physical_trauma', 'killed', 'experience', 'information'])
            ->using(Pivot\CampaignPlayer::class);
    }

    public function info($key, $default = null)
    {
        return data_get($this->information, $key, $default);
    }

    public function setInfo($key, $value)
    {
        $this->information = array_merge($this->information, [$key => $value]);

        $this->saveQuietly();
    }

    public function route()
    {
        return route('campaign.play', $this->id);
    }
}
