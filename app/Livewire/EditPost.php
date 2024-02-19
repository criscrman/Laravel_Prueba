<?php

namespace App\Livewire;
use Livewire\Attributes\Reactive;
use App\Models\Inventario;
use Livewire\Component;

class EditPost extends Component
{   
    #[Reactive] 
    public $opens = false;

    public $Inventario;

    public function mount(Inventario $Inventario){
        $this->Inventario = $Inventario;
    }



    public function render()
    {
        return view('livewire.edit-post');
    }
}
