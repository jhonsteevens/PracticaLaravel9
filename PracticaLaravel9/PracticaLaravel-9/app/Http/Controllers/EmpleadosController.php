<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    //

    public function index()
    {
        $titulo = "Vista principal de empleados";
        $empleados = Empleado::orderBy('id', 'desc')->paginate(15);
        $cargos = Cargo::all();
        return view('Empleados.index', compact('titulo', 'empleados', 'cargos'));
    }
    public function crear()
    {
        $titulo = "Vista crear de empleados";
        return view('Empleados.crear');
    }
    public function mostrar()
    {
        $titulo = "Vista mostar de empleados";
        return view('Empleados.mostrar');
    }

    public function editar()
    {
        $titulo = "Vista editar de empleados";
        return view('Empleados.editar');
    }
    public function guardar(){

        $campos=request()->validate([
            'nombre'=>'required|min:3',
            'edad'=>'required',
            'direccion'=>'required',
            'email'=>'required|email',
            'idCargo'=>'required'
    
        ]);
        Empleado::create($campos);
    
        return redirect('empleados')->with('mensaje', 'Empleado guardado');   
    }
}
