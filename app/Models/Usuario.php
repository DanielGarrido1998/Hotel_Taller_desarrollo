<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario'; // Nombre de la tabla

    protected $primaryKey = 'id_usuario'; // Clave primaria
    public $timestamps = false;

    protected $fillable = [
        'username',
        'correo',
        'contraseña',
    ];

    public function empleadoUsuario()
    {
        return $this->hasOne(EmpleadoUsuario::class, 'id_usuario');
    }
}
