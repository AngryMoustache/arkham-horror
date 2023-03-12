<?php

namespace App\Models\Pivot;

use App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CampaignPlayer extends Pivot
{
    protected $fillable = [
        'investigator_id',
        'experience',
        'mental_trauma',
        'physical_trauma',
        'killed',
        'information',
    ];

    public function campaign()
    {
        return $this->belongsTo(Models\Campaign::class);
    }

    public function player()
    {
        return $this->belongsTo(Models\Player::class);
    }

    public function investigator()
    {
        return $this->belongsTo(Models\Card::class, 'investigator_id');
    }
}
