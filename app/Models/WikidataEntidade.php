<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WikidataEntidade
 * 
 * @property int $id
 * @property string $id_entity
 * @property string $label
 * @property int $id_instancia_de
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class WikidataEntidade extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id_instancia_de' => 'int'
	];

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'id_entity',
		'label',
		'id_instancia_de',
		'date_added'
	];
}
