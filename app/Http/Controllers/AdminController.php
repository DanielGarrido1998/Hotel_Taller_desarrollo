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

class AdminController extends Controller
{

    public function login()
    {
        return view('login');
    }



    public function admin(Request $request)
    {

        $correo = $request->input('correo');
        $password = $request->input('password');

        $usuario = Usuario::where('correo', $correo)->first();

        if($usuario){
            if (Hash::check($password, $usuario->contraseña))
            {
                Session::put('user', $usuario);
                return view('adminhome');
            }
            else
            {
                return view('login');
            }
        }
        else{
            return view('login');
        }
    }

    public function AdminHabitaciones()
    {
        if (Session::has('user')){
            $habitaciones = Habitacion::all();
            return view('adminhabitaciones', compact('habitaciones'));
        }else {
            return redirect()->route('login');
        }
    }

    public function AdminAdministradores()
    {
        if (Session::has('user')) {
            $empleados = Empleado::get();
            return view('adminadministradores', compact('empleados'));
        } else {
            return view('login');
        }

    }

    public function AdminReservas()
    {
        if(Session::has('user')){
            $reservas = Reserva::with(['cliente', 'habitacion'])->get();
            return view('adminreservas', compact('reservas'));
        }else {
            return view('login');
        }
    }

    public function Logout()
    {
        Session::forget('user');

        return redirect()->route('login');
    }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//CRUD ADMINISTRADORES

    

}










