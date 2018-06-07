<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProcessedReference
 * 
 * @property int $id
 * @property int $type
 * @property string $label
 * @property string $url
 * @property int $id_entity
 * @property int $id_entity_instancia_de
 * @property string $description
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class ProcessedReference extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'id_entity' => 'int',
		'id_entity_instancia_de' => 'int'
	];

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'type',
		'label',
		'url',
		'id_entity',
		'id_entity_instancia_de',
		'description',
		'date_added'
	];
}
