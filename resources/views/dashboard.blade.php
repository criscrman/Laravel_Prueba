<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
               <!-- <x-welcome /> -->

               <div class="bg-gray-300 rounded-lg px-2 mt-1 mx-2 ">
                <h2 class="mb-2 text-lg font-semibold text-gray-900">Lista de Pruebas: </h2>
                <ol class="border-1 border-black">
                    @foreach ($Inventarios as $prueba)
                        <li class="font-bold pt-1.5 border-t-2 border-t-white ">
                            <a class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('prueba.show', $prueba->id)}}">{{$prueba->name}}</a>
                        </li>
                    @endforeach
            
                </ol>
            
                {{$Inventarios->links()}}
            </div>
               
            </div>
        </div>
    </div>
</x-app-layout>
