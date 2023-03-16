<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\Set;
use Livewire\Component;

class Campaigns extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.campaigns', [
            'sets' => Set::whereHas('campaigns')->get(),
        ]);
    }

    public function deleteCampaign($campaignId)
    {
        $this->emit('open-modal', 'delete-confirmation', [
            'modelId' => $campaignId,
            'modelClass' => Campaign::class,
        ]);
    }
}
