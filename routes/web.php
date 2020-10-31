<?php

use App\Http\Controllers\dashcoardcontroller;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

// obtener una vista especifica index, vista, create
// Route::get()



// Agrupa rutas
// Route::group()
//=> asignar, ->acceder

Auth::routes();
//rutas agrupadas
Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    // incuye todos los metodos que encuentra en el controlador
    Route::resource ('dashboard', 'dashcoardcontroller');

    Route::resource('proveedores','ProveedorController');
    Route::get('proveedores-pdf','ProveedorController@exportPDF')->name('proveedores.pdf');

    Route::resource('productos','ProductoController');
    Route::get('productos-pdf','ProductoController@exportPDF')->name('productos.pdf');

    Route::resource('clientes','ClienteController');
    Route::get('clientes-pdf','ClienteController@exportPDF')->name('clientes.pdf');

    Route::resource('procedimientoProductos', 'ProcedimientoProductoController');
});
