<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Empleado;
use App\Models\EmpleadoUsuario;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    public function editreserva($id_reserva)
    {
        if(Session::has('user')){
            $habitaciones_disponibles = Habitacion::where('estado', 'Libre')->get();
            $numeroreserva = intval($id_reserva);
            $editreserva = Reserva::with(['cliente', 'habitacion'])
            ->where('id_reserva', $id_reserva)
            ->first();

            return view('editreserva', ['reserva' => $editreserva, 'habitaciones_disponibles' => $habitaciones_disponibles]);
        }else{
            return redirect()->route('login');
        }
        }

    public function ingresarreserva(Request $request)
    {
        if(Session::has('user')){
            $request->validate([
                'nombre'=>['required'],
                'apellido'=>['required'],
                'correo'=>['required'],
                'tipo_identificacion'=>['required'],
                'identificacion'=>['required'],
                'tarjeta'=>['required'],
                'numero_habitacion'=>['required'],
                'cantidad_adultos' => ['required', 'integer', 'min:0', 'max:2'],
                'cantidad_menores' => ['required', 'integer', 'min:0', 'max:2'],
                'fecha_inicio' => ['required', 'date', 'after_or_equal:today'],
                'fecha_fin'=>['required', 'date', 'after_or_equal:today']
            ]);


            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $correo = $request->input('correo');
            $tipo_identificacion = $request->input('tipo_identificacion');
            $identificacion = $request->input('identificacion');
            $tarjeta = $request->input('tarjeta');
            $numero_habitacion = $request->input('numero_habitacion');
            $cantidad_adultos = $request->input('cantidad_adultos');
            $cantidad_menores = $request->input('cantidad_menores');
            $fecha_inicio = $request->input('fecha_inicio');
            $fecha_fin = $request->input('fecha_fin');

            $cliente = new Cliente();
            $reserva = new Reserva();

            $cliente->tarjeta = $tarjeta;
            $cliente->nombre = $nombre;
            $cliente->apellido = $apellido;
            $cliente->tipo_identificacion = $tipo_identificacion;
            $cliente->identificacion = $identificacion;
            $cliente->correo = $correo;
            $cliente->save();

            $ultimoId_cliente = $cliente->id_cliente;
            $reserva->id_cliente = $ultimoId_cliente;
            $reserva->numero_habitacion = $numero_habitacion;
            $reserva->cantidad_adultos = $cantidad_adultos;
            $reserva->cantidad_menores = $cantidad_menores;
            $reserva->fecha_inicio = $fecha_inicio;
            $reserva->fecha_fin = $fecha_fin;
            $reserva->save();

            $nuevahabitacion = Habitacion::where('numero_habitacion', $numero_habitacion)->first();
            $nuevahabitacion->estado = "Ocupada";
            $nuevahabitacion->save();

            session()->flash('success', 'Reserva ingresada exitosamente.');
            return redirect()->route('adreservas');
        }else{
            return redirect()->route('login');
        }
    }


    public function updatereserva(Request $request)
    {
        if(Session::has('user')){
            $request->validate([
                'id_reserva'=>['required'],
                'nombre'=>['required'],
                'apellido'=>['required'],
                'correo'=>['required'],
                'numero_habitacion'=>['required'],
                'identificacion' =>['required'],
                'cantidad_adultos' => ['required', 'integer', 'min:0', 'max:2'],
                'cantidad_menores' => ['required', 'integer', 'min:0', 'max:2'],
                'fecha_inicio' => ['required', 'date', 'after_or_equal:today'],
                'fecha_fin'=>['required', 'date', 'after_or_equal:today'],
                'check' => ['required']
            ]);

            $id_reserva = $request->input('id_reserva');
            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $correo = $request->input('correo');
            $identificacion = $request->input('identificacion');
            $num_habitacion = $request->input('numero_habitacion');
            $cantidad_adultos = $request->input('cantidad_adultos');
            $cantidad_menores = $request->input('cantidad_menores');
            $fecha_inicio = $request->input('fecha_inicio');
            $fecha_fin = $request->input('fecha_fin');
            $check = $request->input('check');

            $reserva = Reserva::where('id_reserva',$id_reserva)->first();
            $idcliente = $reserva->id_cliente;
            $cliente = Cliente::where('id_cliente', $idcliente)->first();
            if($reserva){
                $num_antigua_habitacion = $reserva->numero_habitacion;
                $reserva->numero_habitacion = $num_habitacion;
                $reserva->cantidad_adultos = $cantidad_adultos;
                $reserva->cantidad_menores = $cantidad_menores;
                $reserva->fecha_inicio = $fecha_inicio;
                $reserva->fecha_fin = $fecha_fin;
                $reserva->check_in = $check;
                $reserva->save();
                $cliente->nombre = $nombre;
                $cliente->apellido = $apellido;
                $cliente->correo = $correo;
                $cliente->identificacion = $identificacion;
                $cliente->save();
                if($num_habitacion != $num_antigua_habitacion)
                {
                    $nuevahabitacion = Habitacion::where('numero_habitacion', $num_habitacion)->first();
                    $nuevahabitacion->estado = "Ocupada";
                    $nuevahabitacion->save();
                    $antiguahabitacion = Habitacion::where('numero_habitacion', $num_antigua_habitacion)->first();
                    $antiguahabitacion->estado = "Libre";
                    $antiguahabitacion->save();
                }

                session()->flash('success', 'Reserva modificada exitosamente.');
                return redirect()->route('adreservas');
            }


            return redirect()->route('adreservas');
        }else{
            return redirect()->route('login');
        }
    }

    public function eliminarReserva($id_reserva)
    {
        //dd($id_reserva);
        if(Session::has('user')){
            $reserva = Reserva::where('id_reserva', $id_reserva)->first();
            $cliente_reserva = $reserva->id_cliente;
            if($reserva){
                $reserva->delete();
                $id_cliente_reserva = $reserva->id_cliente;
                $cliente = Cliente::where('id_cliente', $id_cliente_reserva)->first();
                $cliente->delete();
                $id_user_reserva = $cliente->id_user;
                $num_habitacion = $reserva->numero_habitacion;
                $habitacion = Habitacion::where('numero_habitacion', $num_habitacion)->first();
                $habitacion->estado = "Libre";
                $habitacion->save();
                session()->flash('success', 'Reserva eliminada exitosamente.');
                return redirect()->route('adreservas');

            }
        }else{
            return redirect()->route('login');
        }
    }

    public function check($id_reserva)
    {
        if(Session::has('user')){
            $reserva = Reserva::where('id_reserva', $id_reserva)->first();
            if($reserva){
                $reserva->check_in = "CHECKED";
                $reserva->save();
                session()->flash('success', 'Check-in realizado exitosamente.');
                    return redirect()->route('adreservas');
            }
                return redirect()->route('login');
            }else{
            return redirect()->route('login');
        }
    }
}
