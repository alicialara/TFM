<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Estado
 * 
 * @property int $id
 * @property int $ubicacionpaisid
 * @property string $estadonombre
 *
 * @package App\Models
 */
class Estado extends Eloquent
{
	protected $table = 'estado';
	public $timestamps = false;

	protected $casts = [
		'ubicacionpaisid' => 'int'
	];

	protected $fillable = [
		'ubicacionpaisid',
		'estadonombre'
	];
}
