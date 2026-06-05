<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HabUrbana;

class ViaCreate extends Component
{
    public $cont=1;
    public $hab_urbana2;
    public $hab_urbana_id;

    public function mount($hab_urbana_id)
    {
        $this->hab_urbana2=HabUrbana::where('id',$hab_urbana_id)->first();
    }

    public function render()
    {
        return view('livewire.via-create');
    }

    public function aumentar()
    {
        $this->dispatchBrowserEvent('selects',['cont2' => $this->cont]);
        $this->cont++;

    }
}
