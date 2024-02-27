<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inventario;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShowPost extends Component
{
    use WithPagination;
    public string $search = '';
    public $Inventario;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render'];


    public $PostEdit = [
        'Nombre' => ''
    ];

    public $open_edit = false;
    
    public function render()
    {   
        $Inventarios=Inventario::where('Nombre', 'like','%'. $this->search.'%')
        ->orWhere('Estado', 'like','%'. $this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->get();


     

        return view('livewire.show-post', compact('Inventarios'), ['Inventario' => Auth::user()->Inventario,]);
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

    public function edit(Inventario $Inventario) {
        $this-> Inventario = $Inventario;
        $this-> open_edit = true;

        $this-> PostEdit['Nombre'] = $Inventario->Nombre;
    }


    public function delete(Inventario $Inventario) 
    {   
        /*Mirar Cómo autorizar/*
      /*  $this->authorize('delete', $Inventario);*/
 
        $Inventario->delete();
    }

  
    
}
