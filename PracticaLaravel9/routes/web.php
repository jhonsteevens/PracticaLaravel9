<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('prueba.principal');
});

Route::get('/vistauno', function () {
    return view('primera.primeravista.primeravista');
});

Route::get('empleados', function () {
    $mensaje = 'vista principal empleados';
    return $mensaje;
});

Route::get('empleados', [EmpleadosController::class, 'index'])->name('empleadoIndex');
Route::get('empleados/crear', [EmpleadosController::class, 'crear'])->name('empleadoCrear');
Route::get('empleados/mostrar', [EmpleadosController::class, 'mostrar'])->name('empleadoMostrar');
Route::get('empleados/editar', [EmpleadosController::class, 'editar'])->name('empleadoEditar');