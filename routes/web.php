<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EmpleadoController;
use App\Models\Habitacion;
use App\Models\Rol;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
//paginas principales
Route::get('/', [TableController::class, 'index']);
Route::resource('home', TableController::class);
Route::resource('admin', AdminController::class);

//paginas publicas a clientes
Route::post('/habitacion', [TableController::class, 'habitaciones'])->name('habitaciones');
Route::get('/data', [TableController::class, 'data'])->name('data');
Route::post('/ingreso', [TableController::class, 'ingreso'])-> name('ingreso');
Route::get('/success', [TableController::class, 'success'])->name('success');
Route::get('/comprobantepdf', [TableController::class, 'pdf'])->name('comprobantepdf');


//ADMIN//
//paginas administrador
Route::view('/admin',[AdminController::class, 'login'])->name('login');
Route::post('/adminhome',[AdminController::class, 'admin'])->name('admin');

Route::group(['middleware' => 'web'], function () {
    Route::get('/adhabitacion', [AdminController::class, 'AdminHabitaciones'])->name('adhabitaciones');
    Route::get('/adadministradores',[AdminController::class, 'AdminAdministradores'])->name('adadministradores');
    Route::get('/adreservas', [AdminController::class, 'AdminReservas'])->name('adreservas');

    //paginas creacion
    Route::get('/crearhabitacion', function () {
        if (Session::has('user')) {
            return view('crearhabitacion');
        } else {
            return redirect()->route('login');
        }
    })->name('crearhabitacion');

    Route::get('/crearadministrador', function () {
        if (Session::has('user')) {
            $roles = Rol::get();
            return view('crearadministrador', ['roles' => $roles]);
        } else {
            return redirect()->route('login');
        }
    })->name('crearadministrador');

    Route::get('/crearreserva', function () {
        if (Session::has('user')) {
            $habitacionesLibres = Habitacion::where('estado', 'Libre')->get();
            return view('crearreserva', ['habitacionesLibres' => $habitacionesLibres]);
        } else {
            return redirect()->route('login');
        }
    })->name('crearreserva');

    //paginas save() creaciones
    Route::post('/ingresarhabitacion',[HabitacionController::class, 'ingresarhabitacion'])->name('ingresarhabitacion');
    Route::post('/ingresaradministrador',[EmpleadoController::class, 'ingresaradministrador'])->name('ingresaradministrador');
    Route::post('/ingresarreserva',[ReservaController::class, 'ingresarreserva'])->name('ingresarreserva');

    //campo para editar habitacion
    Route::get('/edithabitacion/{numero_habitacion}',[HabitacionController::class, 'edithabitacion'])->name('edithabitacion');
    Route::get('/editadministrador/{id_empleado}',[EmpleadoController::class, 'editadministrador'])->name('editadministrador');
    Route::get('/editreserva/{id_reserva}',[ReservaController::class, 'editreserva'])->name('editreserva');

    //campo de update
    Route::post('/update',[HabitacionController::class, 'updatehabitacion'])->name('updatehabitacion');
    Route::post('/updateadmin',[EmpleadoController::class, 'updateadministrador'])->name('updateadministrador');
    Route::post('/updatereserva',[ReservaController::class, 'updatereserva'])->name('updatereserva');

    //campo eliminar
    Route::get('/eliminarhabitacion/{numero_habitacion}', [HabitacionController::class, 'eliminarHabitacion'])->name('eliminarhabitacion');
    Route::get('/eliminaradministrador/{id_empleado}', [EmpleadoController::class, 'eliminarAdministrador'])->name('eliminaradministrador');
    Route::get('/eliminarreserva/{id_reserva}', [ReservaController::class, 'eliminarReserva'])->name('eliminarreserva');

    //ckeck-in
    Route::get('/checkin/{id_reserva}', [ReservaController::class, 'check'])->name('check');

    //logout
    Route::get('/logout',[AdminController::class, 'Logout'])->name('logout');
});
