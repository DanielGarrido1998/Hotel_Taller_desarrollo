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

class EmpleadoController extends Controller
{
    public function editadministrador($id_empleado)
    {
        if(Session::has('user')){
            $numeroempleado = intval($id_empleado);
            $edit_empleado = Empleado::where('id_empleado', $numeroempleado)->first();
            return view('editadministrador', ['empleado' => $edit_empleado]);
        }else{
            return redirect()->route('login');
        }
    }

    public function ingresaradministrador(Request $request)
    {
        if(Session::has('user')){
            $request->validate([
                'nombre'=>['required'],
                'apellido_paterno'=>['required'],
                'apellido_materno'=>['required'],
                'telefono'=>['required'],
                'tipo_identificacion'=>['required'],
                'identificacion'=>['required'],
                'rol'=>['required'],
                'username' => ['required'],
                'correo'=>['required','email'],
                'password'=>['required']
            ]);

            $nombre = $request->input('nombre');
            $apellido_paterno = $request->input('apellido_paterno');
            $apellido_materno = $request->input('apellido_materno');
            $telefono = $request->input('telefono');
            $tipo_identificacion = $request->input('tipo_identificacion');
            $rol = $request->input('rol');
            $identificacion = $request->input('identificacion');
            $username = $request->input('username');
            $correo = $request->input('correo');
            $password = $request->input('password');

            $empleado = new Empleado();
            $usuario = new Usuario();
            $emp_usu = new EmpleadoUsuario();

            $empleado->nombre = $nombre;
            $empleado->apepat = $apellido_paterno;
            $empleado->apemat = $apellido_materno;
            $empleado->telefono = $telefono;
            $empleado->tipo_identificacion = $tipo_identificacion;
            $empleado->identificacion = $identificacion;
            $num_rol = Rol::where('nombre_rol', $rol)->first();
            $empleado->id_rol = $num_rol->id_rol;
            $empleado->save();

            $usuario->username = $username;
            $usuario->correo = $correo;
            $hashedPassword = Hash::make($password);
            $usuario->contraseña =$hashedPassword;
            $usuario->save();

            $id_emp = $empleado->id_empleado;
            $id_usu = $usuario->id_usuario;

            $emp_usu->id_empleado = $id_emp;
            $emp_usu->id_usuario = $id_usu;
            $emp_usu->save();

            //return $request->all();
            session()->flash('success', 'Empleado ingresado exitosamente.');
            return redirect()->route('adadministradores');
        }else{
            return redirect()->route('login');
        }
    }

    public function updateadministrador(Request $request)
    {
        if(Session::has('user')){
            $request->validate([
                'id_empleado'=>['required'],
                'nombre'=>['required'],
                'username'=>['required'],
                'apellido_paterno'=>['required'],
                'apellido_materno'=>['required'],
                'tipo_identificacion'=>['required'],
                'identificacion'=>['required'],
                'correo'=>['required','email'],
                'telefono'=>['required'],
                'rol' => ['required']
            ]);

            $id_empleado = $request->input('id_empleado');
            $nombre = $request->input('nombre');
            $apellido_paterno =$request->input('apellido_paterno');
            $apellido_materno =$request->input('apellido_materno');
            $tipo_ident = $request->input('tipo_identificacion');
            $identificacion = $request->input('identificacion');
            $username = $request->input('username');
            $correo = $request->input('correo');
            $telefono =$request->input('telefono');
            $rol = $request->input('rol');
            //return $request->all();
            $empleado = Empleado::where('id_empleado', $id_empleado)->first();
            $id_usuario = $empleado->empleadoUsuario->usuario->id_usuario;
            $usuario = Usuario::where('id_usuario',$id_usuario)->first();

            //dd($edithabitacion);
            if ($usuario) {
                $usuario->username = $username;
                $usuario->correo = $correo;
                $usuario->save();
                $empleado->nombre = $nombre;
                $empleado->apepat = $apellido_paterno;
                $empleado->apemat = $apellido_materno;
                $empleado->telefono = $telefono;
                $empleado->tipo_identificacion = $tipo_ident;
                $empleado->identificacion = $identificacion;
                $empleado->save();
                session()->flash('success', 'Empleado modificado exitosamente.');
                return redirect()->route('adadministradores');
            }else{
                session()->flash('error', 'No se pudo modificar el empleado.');
                return redirect()->route('adadministradores');
            }
        }else{
            return redirect()->route('login');
        }
    }

        public function eliminarAdministrador($id_empleado)
    {
        if (Session::has('user')) {
            // Verificar si hay más de 2 empleados en la tabla "empleado"
            $totalEmpleados = Empleado::count();

            if ($totalEmpleados > 2) {
                $empleado = Empleado::where('id_empleado', $id_empleado)->first();
                $num_usuario = EmpleadoUsuario::where('id_empleado', $id_empleado)->first();
                $usuario = Usuario::where('id_usuario', $num_usuario->id_usuario)->first();

                if ($empleado) {
                    DB::table('empleado_usuario')
                        ->where('id_empleado', $id_empleado)
                        ->delete();
                    $usuario->delete();
                    $empleado->delete();
                    session()->flash('success', 'Empleado eliminado exitosamente.');
                    return redirect()->route('adadministradores');
                } else {
                    session()->flash('error', 'No se pudo eliminar el administrador.');
                    return redirect()->route('adadministradores');
                }
            } else {
                session()->flash('error', 'No se puede eliminar el administrador. Deben haber al menos 2 empleados.');
                return redirect()->route('adadministradores');
            }
        } else {
            return redirect()->route('login');
        }
    }

}
