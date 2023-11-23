<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property int $id_cliente
 * @property string|null $tarjeta
 * @property string $nombre
 * @property string $apellido
 * @property string $tipo_identificacion
 * @property string $identificacion
 * @property string $correo
 *
 * @property Collection|Reserva[] $reservas
 *
 * @package App\Models
 */
class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'tarjeta',
        'nombre',
        'apellido',
        'tipo_identificacion',
        'identificacion',
        'correo',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_cliente');
    }
}
