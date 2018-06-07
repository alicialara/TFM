<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Log
 * 
 * @property int $id
 * @property int $id_usuario
 * @property string $key
 * @property string $value
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Log extends Eloquent
{
	protected $table = 'log';

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'key',
		'value',
		'url'
	];
}
