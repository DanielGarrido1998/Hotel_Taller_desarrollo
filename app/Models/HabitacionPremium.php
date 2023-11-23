<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HabitacionPremium
 * 
 * @property int $id_h_premium
 * @property float $valor
 * @property int $numero_habitacion
 * 
 * @property Habitacion $habitacion
 *
 * @package App\Models
 */
class HabitacionPremium extends Model
{
	protected $table = 'habitacion_premium';
	protected $primaryKey = 'id_h_premium';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_h_premium' => 'int',
		'valor' => 'float',
		'numero_habitacion' => 'int'
	];

	protected $fillable = [
		'valor',
		'numero_habitacion'
	];

	public function habitacion()
	{
		return $this->belongsTo(Habitacion::class, 'numero_habitacion');
	}
}
