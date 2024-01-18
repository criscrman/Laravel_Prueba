<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index() {

        $inventarios = Inventario::orderBy('id','desc')->paginate();

        return view('Inventario.index', compact('inventarios') );
    }

}
