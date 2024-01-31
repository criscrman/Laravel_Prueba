<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inventario;
use Livewire\WithPagination;

class ShowPost extends Component
{
    use WithPagination;
    public string $search = '';
    
    public function render()
    {   
        $Inventarios=Inventario::where('Nombre', 'like','%'. $this->search.'%')->get();

        return view('livewire.show-post', compact('Inventarios'));
    }
}
