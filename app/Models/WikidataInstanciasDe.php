<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WikidataInstanciasDe
 * 
 * @property int $id
 * @property string $id_entity
 * @property string $label
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class WikidataInstanciasDe extends Eloquent
{
	protected $table = 'wikidata_instancias_de';
	public $timestamps = false;

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'id_entity',
		'label',
		'date_added'
	];
}
