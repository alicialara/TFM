<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WikidataEntitiesToLabel
 * 
 * @property string $id
 * @property string $key_solr
 * @property string $label
 *
 * @package App\Models
 */
class WikidataEntitiesToLabel extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'key_solr',
		'label'
	];
}
