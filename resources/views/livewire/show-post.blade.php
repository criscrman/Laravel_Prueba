<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   


 <div class="max-w-7xl mx-auto  sm:px-0 md:px-6 lg:px-8">
   
    <div class="py-4 px-3">
    <x-input type="text" wire:model.live="search" class="w-full" placeholder="Buscar..." />
    
    </div>
   
<div class="relative overflow-x-auto shadow-md md:rounded-lg">
    @if ($Inventarios->count()) 
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Inventarios as $Inventario)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
              
             
                  
              
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$Inventario->id}}
                </th>
                <td class="px-6 py-4">
                    {{$Inventario->Nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$Inventario->Descripcion}}
                </td>
                <td class="px-6 py-4">
                    {{$Inventario->Estado}}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
