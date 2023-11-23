<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado'; // Nombre de la tabla

    protected $primaryKey = 'id_empleado'; // Clave primaria
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apepat',
        'apemat',
        'telefono',
        'id_rol',
        'identificacion',
        'tipo_identificacion',
    ];

    // Relación con la tabla "rol"
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }

    public function empleadoUsuario()
    {
        return $this->hasOne(EmpleadoUsuario::class, 'id_empleado');
    }
}
