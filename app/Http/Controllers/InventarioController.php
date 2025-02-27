<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventario;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index() {

        /*$inventarios = Inventario::orderBy('id','desc')->paginate();

        return view('Inventario.index', compact('inventarios') );
        */
        $Inventarios = Inventario::orderBy('id','desc')->paginate();
        return view('Inventario.index',compact('Inventarios'));
    }



    public function create() {

        return view('prueba.create' );
    }

    public function store(/*Request*/ StoreInventario $request){
         /* Validadores hechos de forma manual/*
       /* $request->validate([  
            'name' => 'required|min:3',
            'titulo' => 'required|max:20',
            'description' => 'required|min:10|max:400' 

        ]);*/
        
         /* Función para crear un nuevo dato hecho uno por uno */

         /*
        $prueba = new prueba();

        $prueba->name = $request->name;
        $prueba->titulo = $request->titulo;
        $prueba->description = $request->description; 
        
        $prueba-> save();
        */
        $Inventario = Inventario::create( $request->all());

        return redirect()->route('Inventario.index',$Inventario);

        
        

    }

    public function show(Inventario $inventario /*$id*/) { 
       /* $prueba = prueba::find($id);*/
        return view('inventario.show', compact('prueba'));
    }


    
    public function edit(Inventario $inventario) {

        /* $prueba = prueba::find($id);*/

        return view('inventario.edit', compact('inventario'));

    }

    public function update(StoreInventario $request ,Inventario $Inventario){
        /* Validadores hechos de forma manual/*
        /*$request->validate([  
            'name' => 'required|min:3|max:10',
            'titulo' => 'required',
            'description' => 'required' 

        ]); */
        /* Función para actualizar hecho uno por uno */
       /* $prueba->name = $request->name;
        $prueba->titulo = $request->titulo;
        $prueba->description = $request->description; 
        
        $prueba-> save();
        
        
        */

        $Inventario -> update( $request->all() );
        return redirect()->route('Inventario.show',$Inventario);


    }

    public function destroy($id){
        $Inventario = Inventario::find($id);
        $Inventario -> delete();

        return redirect()->back();
    }

}
