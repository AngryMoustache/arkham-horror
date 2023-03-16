<?php

namespace App\Models;

use App\Http\Clients\ArkhamDB;
use App\Models\Pivot\CampaignPlayer;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
    ];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class)
            ->using(Pivot\CampaignPlayer::class);
    }

    public function deck(Campaign $campaign)
    {
        $deck = CampaignPlayer::where([
            'campaign_id' => $campaign->id,
            'player_id' => $this->id,
        ])->first();

        return collect(ArkhamDB::deck($deck->deck_id)['slots'])->map(function ($amount, $card) {
            return [
                'amount' => $amount,
                'card' => Card::where('code', $card)->first(),
            ];
        });
    }
}
