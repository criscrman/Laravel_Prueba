<?php

namespace App\Livewire;
use App\Models\Inventario;
use App\Http\Requests\StoreInventario;

use Livewire\Component;

class CreatePost extends Component
{

    public $open="true";

    public $Nombre, $Serial, $Descripcion, $Ubicacion, $Estado, $Precio, $Ultimo_Mantenimiento, $Recomentacion;

    public function save () {
        Inventario::create([
            'Nombre' => $this->Nombre,
            'Serial' => $this->Serial,
            'Descripcion' => $this->Descripcion,
            'Ubicacion' => $this->Ubicacion,
            'Estado' => $this->Estado,
            'Precio' => $this->Precio,
            'Ultimo_Mantenimiento' => $this->Ultimo_Mantenimiento,
            'Recomentacion' => $this->Recomentacion
            
        ]);
   
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
