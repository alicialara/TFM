<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProcessedArtwork
 * 
 * @property int $id
 * @property int $id_wikidata
 * @property int $id_wikipedia
 * @property int $id_museodelprado
 * @property int $indexed_solr
 * @property int $processed_concepts
 * @property int $segmentated
 * @property \Carbon\Carbon $date_added
 * @property \Carbon\Carbon $date_modified
 * @property string $name
 * @property string $image
 * @property string $json_metadata
 *
 * @package App\Models
 */
class ProcessedArtwork extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id_wikidata' => 'int',
		'id_wikipedia' => 'int',
		'id_museodelprado' => 'int',
		'indexed_solr' => 'int',
		'processed_concepts' => 'int',
		'segmentated' => 'int'
	];

	protected $dates = [
		'date_added',
		'date_modified'
	];

	protected $fillable = [
		'id_wikidata',
		'id_wikipedia',
		'id_museodelprado',
		'indexed_solr',
		'processed_concepts',
		'segmentated',
		'date_added',
		'date_modified',
		'name',
		'image',
		'json_metadata'
	];
}
