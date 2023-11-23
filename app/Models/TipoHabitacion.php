<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoHabitacion
 * 
 * @property int $id_tipo_habitacion
 * @property string|null $nombre_habitacion
 * 
 * @property Collection|Habitacion[] $habitacions
 *
 * @package App\Models
 */
class TipoHabitacion extends Model
{
	protected $table = 'tipo_habitacion';
	protected $primaryKey = 'id_tipo_habitacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_tipo_habitacion' => 'int'
	];

	protected $fillable = [
		'nombre_habitacion'
	];

	public function habitacions()
	{
		return $this->hasMany(Habitacion::class, 'id_tipo_habitacion');
	}
}
