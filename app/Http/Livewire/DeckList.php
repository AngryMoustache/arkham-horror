<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\Player;
use Livewire\Component;

class DeckList extends Component
{
    public Player $player;
    public Campaign $campaign;

    public function mount(Player $player, Campaign $campaign)
    {
        $this->player = $player;
        $this->campaign = $campaign;
    }
}
