<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Encuesta
 * 
 * @property int $id
 * @property string $cookie_id
 * @property string $data
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class Encuesta extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'cookie_id',
		'data',
		'date_added'
	];
}
