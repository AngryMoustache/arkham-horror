<?php

namespace App\Http\Livewire;

use App\Models\Player;
use Livewire\Component;

class Players extends Component
{
    public string $newPlayerName = '';

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.players', [
            'players' => Player::orderBy('name')
                ->with('campaigns')
                ->get(),
        ]);
    }

    public function newPlayer()
    {
        $this->validate(['newPlayerName' => 'required']);

        Player::create([
            'name' => $this->newPlayerName,
        ]);

        $this->newPlayerName = '';
    }

    public function deletePlayer($playerId)
    {
        $this->emit('open-modal', 'delete-confirmation', [
            'modelId' => $playerId,
            'modelClass' => Player::class,
        ]);
    }
}
