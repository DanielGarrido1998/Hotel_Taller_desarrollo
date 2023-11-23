<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Reserva;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }



    public function habitaciones(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fecha_ingreso' => ['required', 'date', 'after_or_equal:today'],
            'fecha_salida' => ['required', 'date', 'after_or_equal:today'],
            'adultos' => ['required', 'integer', 'min:0', 'max:2'],
            'menores' => ['required', 'integer', 'min:0', 'max:2'],
        ]);
        // Agregar una regla personalizada para verificar que fecha_salida sea posterior a fecha_ingreso
    $validator->after(function ($validator) use ($request) {
        if ($request->fecha_salida <= $request->fecha_ingreso) {
            $validator->errors()->add('fecha_salida', 'La fecha de salida debe ser posterior a la fecha de entrada.');
        }
    });

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        $fecha_ingreso = $request->input('fecha_ingreso');
        $fecha_salida = $request->input('fecha_salida');
        $adultos = $request->input('adultos');
        $menores = $request->input('menores');
        $normal = 1;
        $premium = 2;
        $habitacion = Habitacion::where('id_tipo_habitacion', $normal)->first();
        $habitacion_p = Habitacion::where('id_tipo_habitacion', $premium)->first();


        return view('habitacion', ['habitacion' => $habitacion,'habitacion_p' => $habitacion_p])->with('fecha_ingreso', $fecha_ingreso)->with('fecha_salida', $fecha_salida)->with('adultos',$adultos)->with('menores',$menores );
    }



    public function data(Request $request)
    {
        $fecha_ingreso = $request->input('fecha_ingreso');
        $fecha_salida = $request->input('fecha_salida');
        $adultos = $request->input('adultos');
        $menores = $request->input('menores');
        $habitacion = $request->input('habitacion');
        $valor = $request->input('valor');

        return view('data',['menores' => $menores,'adultos' => $adultos,'habitacion' => $habitacion, 'fecha_ingreso' => $fecha_ingreso, 'fecha_salida' => $fecha_salida, 'valor' => $valor]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formulario');
    }



    public function ingreso(Request $request)
    {

        $request->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'correo' => ['required'],
            'identificacion' => ['required'],
            'tarjeta' => ['required'],
            'tipo_identificacion' => ['required']
        ]);
        //return $request->all();

        $nuevo_cliente = new Cliente();
        $nueva_reserva = new Reserva();

        $tipo_identificacion = $request->input('tipo_identificacion');
        $fecha_ingreso = $request->input('fecha_ingreso');
        $fecha_salida = $request->input('fecha_salida');
        $tipo_habitacion = $request->input('habitacion');
        $adultos = $request->input('adultos');
        $menores = $request->input('menores');
        if($tipo_habitacion == 'Premium'){
            $tipo = 2;
        }
        else{$tipo = 1;}

        $nuevo_cliente->tarjeta = $request->tarjeta;
        $nuevo_cliente->nombre = $request->nombre;
        $nuevo_cliente->apellido = $request->apellido;
        $nuevo_cliente->tipo_identificacion = $tipo_identificacion;
        $nuevo_cliente->identificacion = $request->identificacion;
        $nuevo_cliente->correo = $request->correo;
        $nuevo_cliente->save();

        $habitacion = Habitacion::where('estado', 'Libre')
        ->where('id_tipo_habitacion', $tipo)->inRandomOrder()
        ->first();

        if ($habitacion) {$numero_habitacion = $habitacion->numero_habitacion;}

        $ultimoId_cliente = $nuevo_cliente->id_cliente;
        $nueva_reserva->id_cliente = $ultimoId_cliente;
        $nueva_reserva->numero_habitacion = $numero_habitacion;
        $nueva_reserva->cantidad_adultos = $adultos;
        $nueva_reserva->cantidad_menores = $menores;
        $nueva_reserva->fecha_inicio = $fecha_ingreso;
        $nueva_reserva->fecha_fin = $fecha_salida;
        $nueva_reserva->save();

        $num_ult_habitacion = $nueva_reserva->numero_habitacion;
        $nuevo_estado = 'Ocupada';
        $habitacion_cambio_estado = Habitacion::where('numero_habitacion', $num_ult_habitacion)->first();
        $habitacion_cambio_estado->estado = $nuevo_estado;
        $habitacion_cambio_estado->save();
        return redirect()->route('success');
    }

    public function success()
    {
        $reserva = Reserva::orderBy('id_reserva', 'desc')->first();
        return view('success',['reserva' => $reserva]);
    }

    public function pdf()
    {
        $reserva = Reserva::orderBy('id_reserva', 'desc')->first();
        $pdf = Pdf::loadView('comprobantepdf', compact('reserva'));
        return $pdf->stream();
    }















    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
