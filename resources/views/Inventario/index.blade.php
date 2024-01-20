@extends('layouts.plantilla')

@section('title', 'Inicio')


@section('content')
    @livewire('navigation-menu')
    <div class="flex-1 m-2.5 p-2 bg-slate-400">
    <h1>Hola mundo</h1>
    
    <button type="button" x-data x-on:click="$dispatch('open-modal')" class="bg-green-800 text-yellow-50 p-1 rounded">
        Crear Nuevo
      </button>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias eius aliquid minus est, voluptatibus dignissimos eaque, error saepe, consequatur ipsum soluta? Iste dolorum explicabo dolor animi est odio dolorem officia.</p>
    <x-modal-form title="Crear Nuevo Registro">
        

    </x-modal-form>
    </div>
    
    <div class="bg-gray-300 rounded-lg px-2 mt-1 mx-2 ">
    

    <table class="font-bold pt-1.5 border-t-2 border-t-white">
       
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Ubicacion</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($Inventarios as $Inventario)
            <tr class="">
                
            <td scope="row">{{$Inventario->Nombre}}</td>
            <td scope="row">{{$Inventario->Descripcion}}</td>
            <td scope="row">{{$Inventario->Ubicacion}}</td>
            
            </tr>
            @endforeach
        </tbody>
         
      </table>

    {{$Inventarios->links()}}
    </div>

  
  

  

    @endsection