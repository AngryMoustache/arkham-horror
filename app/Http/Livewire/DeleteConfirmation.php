<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteConfirmation extends Component
{
    public int $modelId;
    public string $modelClass;


    public function delete()
    {
        $model = $this->modelClass::find($this->modelId);
        $model?->delete();

        $this->emit('close-modal');
        $this->emit('refresh');
    }
}
