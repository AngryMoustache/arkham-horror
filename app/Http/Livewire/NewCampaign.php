<?php

namespace App\Http\Livewire;

use App\Enums\CardType;
use App\Models\Card;
use App\Models\Player;
use App\Models\Set;
use Illuminate\Support\Str;
use Livewire\Component;

class NewCampaign extends Component
{
    public Set $set;

    public string $sets;

    public array $fields = [
        'set_id' => null,
        'difficulty' => 'standard',
        'investigators' => [],
    ];

    public function mount(Set $set)
    {
        $this->set = $set;

        $this->sets = Set::orderBy('name')
            ->pluck('name', 'id')
            ->reject(fn ($name) => Str::contains($name, 'Investigator Expansion'))
            ->toJson();

        $this->fields['set_id'] = $set->id;
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
            'set_id' => $this->fields['set_id'],
            'difficulty' => $this->fields['difficulty'],
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
