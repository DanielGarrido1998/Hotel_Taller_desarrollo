<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoUsuario extends Model
{
    protected $table = 'empleado_usuario'; // Nombre de la tabla

    public $timestamps = false; // Desactiva las marcas de tiempo

    protected $fillable = [
        'id_empleado',
        'id_usuario',
    ];

    // Relación con la tabla "empleado"
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id_empleado');
    }

    // Relación con la tabla "usuario"
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
