<?php

namespace App\Livewire;
use App\Models\Inventario;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{

    public $open= false;

    public $Nombre, $Serial, $Descripcion, $Ubicacion, $Estado, $Precio, $Ultimo_Mantenimiento, $Recomentacion;

    #[Validate]
    public function rules()
    {
        return [
        'Nombre' => 'required|max:40|regex:/^[\pL\s\-]+$/u', 
        'Serial' => 'required|alpha:ascii',
        'Descripcion' => 'required|max:20',
        'Ubicacion' => 'required',
        'Estado' =>    'required',
        'Precio' => 'required|numeric',
        'Ultimo_Mantenimiento' => 'Nullable|date|date_format:Y-m-d|before:today',
        'Recomentacion' => 'required|max:10'

    ];
    }

    public function update ($propetyName) {
        $this -> validateOnly($propetyName);
    }
   


    public function save () {

        $validated = $this->validate();
        
        /*METODO LARGO */ 
          /*  Inventario::create(['Nombre' => $this->Nombre,
            'Serial' => $this->Serial,
            'Descripcion' => $this->Descripcion,
            'Ubicacion' => $this->Ubicacion,
            'Estado' => $this->Estado,
            'Precio' => $this->Precio,
            'Ultimo_Mantenimiento' => $this->Ultimo_Mantenimiento,
            'Recomentacion' => $this->Recomentacion  ]); */
            Inventario::create($validated);
        
            
      

        $this->dispatch('render');
   
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
