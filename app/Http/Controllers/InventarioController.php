<?php

namespace App\Http\Controllers;

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

    public function store(/*Request*/ StorePrueba $request){
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
        $prueba = Inventario::create( $request->all() );

        return redirect()->route('Inventario.show',$prueba);

        
        

    }

    public function show(Inventario $inventario /*$id*/) { 
       /* $prueba = prueba::find($id);*/
        return view('inventario.show', compact('prueba'));
    }


    
    public function edit(Inventario $inventario) {

        /* $prueba = prueba::find($id);*/

        return view('Inventario.edit', compact('prueba'));

    }

    public function update(StorePrueba $request ,Inventario $Inventario){
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

    public function destroy(Inventario $Inventario){
        $Inventario -> delete();

        return redirect()->route('Inventario.index');
    }

}
