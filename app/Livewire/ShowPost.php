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

    public $updater;
    
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

    public function edit($Inventario) {

        $this -> updater = $Inventario;
        $this-> open_edit = true;

        $Inventarioid = Inventario::find($Inventario);

        $this-> PostEdit['Nombre'] = $Inventarioid->Nombre;
        $this-> PostEdit['Serial'] = $Inventarioid->Serial;
        $this-> PostEdit['Ubicacion'] = $Inventarioid->Ubicacion;
        $this-> PostEdit['Estado'] = $Inventarioid->Estado;
        $this-> PostEdit['Precio'] = $Inventarioid->Precio;
        $this-> start_date = $this-> PostEdit['Ultimo_Mantenimiento'] = $Inventarioid->Ultimo_Mantenimiento;
        $this -> textarea = $this-> PostEdit['Recomentacion'] = $Inventarioid->Recomentacion;
    }

    public function update(){
        $Inventario = Inventario::find($this->updater);

        $Inventario->update([
            'Nombre' => $this->PostEdit['Nombre'],
            'Serial' => $this->PostEdit['Serial'],
            'Ubicacion' => $this->PostEdit['Ubicacion'],
            'Estado' => $this->PostEdit['Estado'],
            'Precio' => $this->PostEdit['Precio'],
            
    'Ultimo_Mantenimiento' => $this-> start_date,
    'Recomentacion' => $this -> textarea

        ]);

       $this->reset(['updater','PostEdit','open_edit']);
       $this->Inventario = Inventario::all();

    }


    public function delete(Inventario $Inventario) 
    {   
        /*Mirar Cómo autorizar/*
      /*  $this->authorize('delete', $Inventario);*/
 
        $Inventario->delete();
    }

  
    
}
