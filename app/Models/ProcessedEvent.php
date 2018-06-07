<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProcessedEvent
 * 
 * @property int $id
 * @property int $type
 * @property string $year
 * @property string $label
 * @property string $event_type
 * @property string $place
 * @property \Carbon\Carbon $init
 * @property \Carbon\Carbon $end
 * @property int $id_artwork_related
 * @property int $id_character_related
 * @property int $id_reference_related
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class ProcessedEvent extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'id_artwork_related' => 'int',
		'id_character_related' => 'int',
		'id_reference_related' => 'int'
	];

	protected $dates = [
		'init',
		'end',
		'date_added'
	];

	protected $fillable = [
		'type',
		'year',
		'label',
		'event_type',
		'place',
		'init',
		'end',
		'id_artwork_related',
		'id_character_related',
		'id_reference_related',
		'date_added'
	];
}
