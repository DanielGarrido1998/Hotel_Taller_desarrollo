<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Empleado;
use App\Models\EmpleadoUsuario;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class HabitacionController extends Controller
{
    public function edithabitacion($numero_habitacion)
    {
        if(Session::has('user')){
            $numeroHabitacion = intval($numero_habitacion);
            $edithabitacion = Habitacion::where('numero_habitacion', $numeroHabitacion)->first();
            return view('edithabitacion', ['habitacion' => $edithabitacion]);
            //return $request->all();
        } else {
            return redirect()->route('login');
        }
    }

    public function ingresarhabitacion(Request $request)
    {
        if(Session::has('user')){
            $request->validate([
                'numero_habitacion'=> ['required'],
                'tipo'=>['required'],
                'descripcion'=>['required'],
                'capacidad'=>['required'],
                'precio_por_noche'=>['required'],
                'estado'=>['required']
            ]);

            $numero = $request->input('numero_habitacion');

            $habitacionExistente = Habitacion::where('numero_habitacion', $numero)->first();
            if ($habitacionExistente) {
                $errors = ['numero_habitacion' => 'El número de habitación ya está en uso. Por favor, elija otro número.'];
                return redirect()->back()->withErrors($errors)->withInput();
            }

            $tipo = $request->input('tipo');
            if($tipo == "Premium"){
                $tipo_habitacion = 2;
            }else{
                $tipo_habitacion = 1;
            }
            $descripcion = $request->input('descripcion');
            $capacidad = $request->input('capacidad');
            $precio_por_noche = $request->input('precio_por_noche');
            $estado = $request->input('estado');


            $nueva_habitacion = new Habitacion();
            $nueva_habitacion->numero_habitacion = $numero;
            $nueva_habitacion->id_tipo_habitacion = $tipo_habitacion;
            $nueva_habitacion->descripcion = $descripcion;
            $nueva_habitacion->capacidad = $capacidad;
            $nueva_habitacion->precio_por_noche = $precio_por_noche;
            $nueva_habitacion->estado = $estado;
            $nueva_habitacion->save();
            session()->flash('success', 'Habitación creada exitosamente.');

            return redirect()->route('adhabitaciones');
        }else{
            return redirect()->route('login');
        }
    }

    public function updatehabitacion(Request $request)
    {
        if(Session::has('user')){
            $request->validate([
                'numero_habitacion'=> ['required'],
                'tipo_habitacion'=>['required'],
                'descripcion'=>['required'],
                'capacidad'=>['required'],
                'precio_por_noche'=>['required'],
                'estado'=>['required']
            ]);
            //return $request->all();
            $edit_num = $request->input('numero_habitacion');
            $edit_desc = $request->input('descripcion');
            $edit_capacidad = $request->input('capacidad');
            $edit_precio = $request->input('precio_por_noche');
            $edit_estado = $request->input('estado');
            $edit_tipo = $request->input('tipo_habitacion');
            if($edit_tipo == 'Premium'){
                $edit_id_tipo_habitacion = 2;
            }
            else{
                $edit_id_tipo_habitacion = 1;
            }

            $edithabitacion = Habitacion::where('numero_habitacion', $edit_num)->first();

            if ($edithabitacion) {
                $reserva = Reserva::where('numero_habitacion', $edit_num)->first();
                if ($reserva) {
                    session()->flash('error', 'No se puede editar una habitación ocupada por un huesped.');
                    return redirect()->route('adhabitaciones');
                }
                $edithabitacion->descripcion = $edit_desc;
                $edithabitacion->capacidad = $edit_capacidad;
                $edithabitacion->precio_por_noche = $edit_precio;
                $edithabitacion->estado = $edit_estado;
                $edithabitacion->id_tipo_habitacion = $edit_id_tipo_habitacion;
                $edithabitacion->save();
                session()->flash('success', 'Habitación modificada exitosamente.');
                return redirect()->route('adhabitaciones');
            }else{
                session()->flash('error', 'No se pudo modificar la habitación.');
                return redirect()->route('adhabitaciones');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function eliminarHabitacion($numero_habitacion)
    {
        if (Session::has('user')) {
            // Verificar si la habitación está en la tabla de reservas
            $reserva = Reserva::where('numero_habitacion', $numero_habitacion)->first();

            if ($reserva) {
                session()->flash('error', 'No se puede eliminar una habitación con reservas asociadas.');
                return redirect()->route('adhabitaciones');
            }

            $habitacion = Habitacion::where('numero_habitacion', $numero_habitacion)->first();
            if ($habitacion) {
                session()->flash('success', 'Habitación eliminada exitosamente.');
                $habitacion->delete();
                return redirect()->route('adhabitaciones');
            } else {
                session()->flash('error', 'No se pudo eliminar la habitación.');
                return redirect()->route('adhabitaciones');
            }
        } else {
            return redirect()->route('login');
        }
    }


}
