<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Habitacion
 *
 * @property int $numero_habitacion
 * @property string|null $descripcion
 * @property int $capacidad
 * @property float $precio_por_noche
 * @property int $id_tipo_habitacion
 * @property string|null $estado
 *
 * @property TipoHabitacion $tipo_habitacion
 * @property Collection|HabitacionPremium[] $habitacion_premia
 * @property Collection|Reserva[] $reservas
 *
 * @package App\Models
 */
class Habitacion extends Model
{
	protected $table = 'habitacion';
	protected $primaryKey = 'numero_habitacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numero_habitacion' => 'int',
		'capacidad' => 'int',
		'precio_por_noche' => 'float',
		'id_tipo_habitacion' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'capacidad',
		'precio_por_noche',
		'id_tipo_habitacion',
		'estado'
	];

	public function tipo_habitacion()
	{
		return $this->belongsTo(TipoHabitacion::class, 'id_tipo_habitacion');
	}

	public function habitacion_premia()
	{
		return $this->hasMany(HabitacionPremium::class, 'numero_habitacion');
	}

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'numero_habitacion');
	}
}
