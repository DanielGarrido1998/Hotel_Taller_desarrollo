<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id_rol
 * @property string $nombre_rol
 * 
 * @property Administrador $administrador
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'id_rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int'
	];

	protected $fillable = [
		'nombre_rol'
	];

	public function administrador()
	{
		return $this->hasOne(Administrador::class, 'id_rol');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_rol');
	}
}
