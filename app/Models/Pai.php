<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pai
 * 
 * @property int $id
 * @property string $paisnombre
 *
 * @package App\Models
 */
class Pai extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'paisnombre'
	];
}
