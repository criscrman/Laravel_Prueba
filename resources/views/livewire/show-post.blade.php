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
                    
                    <livewire:edit-post :$Inventario :key="$Inventario->id" />
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


</div>
