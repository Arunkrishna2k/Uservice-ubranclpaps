<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdCard extends Component
{

    public $params;
    public function render()
    {
        return view('livewire.id-card');
    }
}
