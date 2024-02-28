<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Inventario;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class ShowPost extends Component
{
    use WithPagination;
    public string $search = '';
    public $Inventario;
    public $sort = 'id';
    public $direction = 'desc';

    protected $listeners = ['render' => 'render'];


    public $PostEdit = [
        'Nombre' => '',
        'Serial' => '',
        'Ubicacion' => '',
        'Estado' => '',
        'Precio' => '',
        'Ultimo_Mantenimiento' => 'date:Y-m-d',
        'Recomentacion' => ''
    ];

    public $start_date ='';
    public $textarea ='';

    public $open_edit = false;
    
    public function render()
    {   
        $Inventarios=Inventario::where('Nombre', 'like','%'. $this->search.'%')
        ->orWhere('Estado', 'like','%'. $this->search.'%')
        ->orderBy($this->sort, $this->direction)
        ->get();

       /* $this->start_date = Carbon::now()->format('Y-m-d'); */


     

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
        $this-> PostEdit['Serial'] = $Inventario->Serial;
        $this-> PostEdit['Ubicacion'] = $Inventario->Ubicacion;
        $this-> PostEdit['Estado'] = $Inventario->Estado;
        $this-> PostEdit['Precio'] = $Inventario->Precio;
        $this-> start_date = $this-> PostEdit['Ultimo_Mantenimiento'] = $Inventario->Ultimo_Mantenimiento;
        $this -> textarea = $this-> PostEdit['Recomentacion'] = $Inventario->Recomentacion;
    }


    public function delete(Inventario $Inventario) 
    {   
        /*Mirar Cómo autorizar/*
      /*  $this->authorize('delete', $Inventario);*/
 
        $Inventario->delete();
    }

  
    
}
