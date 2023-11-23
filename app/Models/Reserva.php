<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reserva
 *
 * @property int $id_reserva
 * @property int $id_cliente
 * @property int $numero_habitacion
 * @property int $cantidad_adultos
 * @property int $cantidad_menores
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_fin
 *
 * @property Cliente $cliente
 * @property Habitacion $habitacion
 *
 * @package App\Models
 */
class Reserva extends Model
{
	protected $table = 'reserva';
	protected $primaryKey = 'id_reserva';
	public $timestamps = false;

	protected $casts = [
		'id_cliente' => 'int',
		'numero_habitacion' => 'int',
        'cantidad_adultos' => 'int',
        'cantidad_menores' => 'int',
		'fecha_inicio' => 'datetime',
		'fecha_fin' => 'datetime',
        'check_in' => 'string'
	];

	protected $fillable = [
		'id_cliente',
		'numero_habitacion',
        'cantidad_adultos',
        'cantidad_menores',
		'fecha_inicio',
		'fecha_fin',
        'check_in'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_cliente');
	}

	public function habitacion()
	{
		return $this->belongsTo(Habitacion::class, 'numero_habitacion');
	}
}
