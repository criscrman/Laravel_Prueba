<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   


 <div class="max-w-7xl mx-auto  sm:px-0 md:px-6 lg:px-8">
   
    <div class="py-4 px-3 flex items-center">
    <x-input type="text" wire:model.live="search" class="flex-1 mr-4" placeholder="Buscar..." />
    @livewire('create-post')
    </div>
   
<div class="relative overflow-x-auto shadow-md md:rounded-lg">
    @if ($Inventarios->count()) 
    <table class="min-w-full divide-y text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class=" w-full text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th wire:click="order('id')" scope="col" class="flex flex-row text-left cursor-pointer w-24 px-6 py-3">
                    <div class="float p-1">ID</div>
                    {{--sort --}}
                    @if ($sort == "id")
                    
                        @if ($direction == 'asc')
                        <i class="fa-solid fa-arrow-down-a-z float-right pt-1"></i>
                        
                        @else
                        <i class="fa-solid fa-arrow-up-a-z float-right pt-1"></i>
                        @endif
                    @else
                    <i class="fa-solid fa-sort float-right pt-1"></i>
                    @endif
                </th>
                <th wire:click="order('Nombre')" scope="col" class="min-w-30 cursor-pointer px-6 py-3">
                    Nombre
                    {{--sort --}}
                    @if ($sort == "Nombre")
                    
                        @if ($direction == 'asc')
                        <i class="fa-solid fa-arrow-down-a-z  float-right p-1"></i>
                        
                        @else
                        <i class="fa-solid fa-arrow-up-a-z  float-right p-1"></i>
                        @endif
                    @else
                    <i class="fa-solid fa-sort float-right p-1"></i>
                    @endif
                </th>
                <th wire:click="order('Descripcion')" scope="col" class=" cursor-pointer px-6 py-3 ">
                    Descripción
                    {{--sort --}}
                    @if ($sort == "Descripcion")
                    
                        @if ($direction == 'asc')
                        <i class="fa-solid fa-arrow-down-a-z float-right p-1"></i>
                        
                        @else
                        <i class="fa-solid fa-arrow-up-a-z float-right p-1"></i>
                        @endif
                    @else
                    <i class="fa-solid fa-sort float-right p-1"></i>
                    @endif
                </th>
                <th wire:click="order('Estado')" scope="col" class="float cursor-pointer px-6 py-3">
                    Estado
                    {{--sort --}}
                    @if ($sort == "Estado")
                    
                        @if ($direction == 'asc')
                        <i class="fa-solid fa-arrow-down-a-z float-right p-1"></i>
                        
                        @else
                        <i class="fa-solid fa-arrow-up-a-z float-right p-1"></i>
                        @endif
                    @else
                    <i class="fa-solid fa-sort float-right p-1"></i>
                    @endif
                </th >
                <th  scope="col" class="cursor-pointer px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Inventarios as $Inventario)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              
             
                  
              
                <th scope="row" class="px-6 py-4 min-w-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$Inventario->id}}
                </th>
                <td class="px-6 py-4 min-w-12 max-w-25">
                    {{$Inventario->Nombre}}
                </td>
                <td class="px-6 py-4 max-w-60">
                    {{$Inventario->Descripcion}}
                </td>
                <td class="px-6 py-4">
                    {{$Inventario->Estado}}
                </td>
                <td class="px-6 py-4">
                    
                    <a class="btn btn-green" wire:click.prevent="edit(({{ $Inventario->id }}))">
                        <i class="fas fa-edit"></i>
                    </a>


                    <button wire:click="delete({{ $Inventario->id }})">Eliminar</button> 

                    

              
         
                </td>

                
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="px-6 py-4 text-red-800 font-bold">
            El registro que busca no existe o no coincide.
        </div>
    @endif
</div>



 </div>

 <x-dialog-modal wire:model.live="open_edit">

    <x-slot name="title">
        Editar Registro {{$Inventario->Nombre}}
    </x-slot>

    <x-slot name="content">
        {{$Inventario->id}}

        <div class="p-4 md:p-5 space-y-4 ">
            <div class="form"> 
                <form  class="form-1  md:grid grid-cols-2 gap-4"
                action="{{ route('Inventario.store') }}" method="post">
                @csrf
                
                <div>
                <label for="Nombre" class="">Nombre Completo</label>
                <input type="text" wire:model="PostEdit.Nombre" name="Nombre" class="input-crear"
                    placeholder="Cristian Peréz..." required>
                    <x-input-error for="Nombre"/>
                </div>

                <div>

                    <label for="Serial">
                        Serial
                    </label><input type="text" wire:model="PostEdit.Serial" name="Serial" class="input-crear""
                        x-validate.wholenumber
                        data-error-msg="positive whole number required">
                        <x-input-error for="Serial"/>
                    
                </div>

                <div>

                    <label for="Ubicacion">
                        Ubicación
                    </label><input type="text" wire:model="PostEdit.Ubicacion" name="Ubicacion" class="input-crear">
                    <x-input-error for="Ubicacion"/>
                </div>

                <div>

                    <label for="Estado">
                        Estado
                    </label><input type="text" wire:model="PostEdit.Estado" name="Estado" class="input-crear">
                    <x-input-error for="Estado"/>
                
                </div>

                <div>
                    <label for="Precio">
                        Precio
                    </label><input type="text" wire:model="PostEdit.Precio" name="Precio" class="input-crear">
                        <x-input-error for="Precio"/>
                </div>

                <div>
                    <label for="Ultimo_Mantenimiento">Último Mantenimiento</label><input  type="date"
                        id="start" name="Ultimo_Mantenimiento"  wire:model="start_date" min="2018-01-01"
                        max="2032-12-31" value="{{ Carbon\Carbon::parse($start_date)->format('Y-m-d')}}" />
                        <x-input-error for="Ultimo_Mantenimiento"/>
                </div>


                <div>
                    <label for="Recomentacion">
                        Recomendación
                    </label><input type="text" name="Recomentacion" wire:model.change="PostEdit.Recomentacion"  class="input-crear">
                        <x-input-error for="Recomentacion"/>
                    

                </div>


                <div>
                    <label for="Descripcion">Descripción</label>
                    <textarea name="Descripcion" wire:model="textarea" class="input-crear" cols="30" rows="3">{$textarea}</textarea>
                    <x-input-error for="Descripcion"/>
                  
                </div>

               






            </div>


    </x-slot>

    <x-slot name="footer">
    </x-slot>


 </x-dialog-modal>


</div>
