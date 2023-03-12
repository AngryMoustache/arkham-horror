<?php

namespace App\Http\Livewire;

use App\Enums\CardType;
use App\Models\Card;
use App\Models\Player;
use App\Models\Set;
use Livewire\Component;

class NewCampaign extends Component
{
    public Set $set;

    public array $fields = [
        'investigators' => [],
    ];

    public function mount(Set $set)
    {
        $this->set = $set;
    }

    public function render()
    {
        return view('livewire.new-campaign', [
            'players' => Player::orderBy('name')->get(),
            'investigators' => Card::where('type', CardType::INVESTIGATOR)
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function startCampaign()
    {
        $players = collect($this->fields['investigators'])->filter();

        $campaign = $this->set->campaigns()->create([
            'information' => [],
        ]);

        $players->each(function ($investigator, $player) use ($campaign) {
            $campaign->players()->attach($player, [
                'investigator_id' => $investigator,
            ]);
        });

        return redirect()->route('campaign.play', $campaign);
    }
}
