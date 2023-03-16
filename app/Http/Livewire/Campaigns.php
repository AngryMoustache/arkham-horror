<?php

namespace App\Http\Livewire;

use App\Models\Set;
use Livewire\Component;

class Campaigns extends Component
{
    public function render()
    {
        return view('livewire.campaigns', [
            'sets' => Set::whereHas('campaigns')->get(),
        ]);
    }
}
