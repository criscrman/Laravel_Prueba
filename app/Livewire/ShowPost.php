<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inventario;
use Livewire\WithPagination;

class ShowPost extends Component
{
    use WithPagination;
    public string $search = '';

    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render'];
    
    public function render()
    {   
        $Inventarios=Inventario::where('Nombre', 'like','%'. $this->search.'%')
        ->orWhere('Estado', 'like','%'. $this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->get();

        return view('livewire.show-post', compact('Inventarios'));
    }

    public function order($sort) 
    {
       /* $this->sort ="Estado";*/
        if ($this->sort == $sort) {
            
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
            

        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        
       
       
    }
    
}
