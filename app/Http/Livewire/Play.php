<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use Livewire\Component;

class Play extends Component
{
    public Campaign $campaign;

    public array $fields = [];

    public array $player_information = [];

    public string $notes = '';

    public function mount(Campaign $campaign)
    {
        $this->campaign = $campaign;

        $this->player_information = $this->campaign->players
            ->pluck('pivot.information', 'id')
            ->toArray();

        $this->notes = $this->campaign->info('notes', '');
    }

    public function updatedPlayerInformation($information, $playerId)
    {
        $this->campaign->players()->updateExistingPivot($playerId, [
            'information' => $information,
        ]);
    }

    public function updatedNotes($notes)
    {
        $this->campaign->setInfo('notes', $notes);
    }

    public function setPlayerInformation($playerId, $key, $value)
    {
        $this->campaign->players()->updateExistingPivot($playerId, [
            $key => $value,
        ]);
    }
}
