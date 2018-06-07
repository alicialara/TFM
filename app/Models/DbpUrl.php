<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DbpUrl
 * 
 * @property int $id
 * @property string $url
 * @property int $type
 * @property int $visited
 * @property int $extracted_wikipedia_url
 * @property int $extracted_museo_del_prado_url
 * @property int $wikidata_labels
 * @property int $extracted_museo_del_prado_info
 * @property int $extracted_author_data
 * @property int $extracted_wikipedia_info
 * @property int $preprocessing
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class DbpUrl extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'visited' => 'int',
		'extracted_wikipedia_url' => 'int',
		'extracted_museo_del_prado_url' => 'int',
		'wikidata_labels' => 'int',
		'extracted_museo_del_prado_info' => 'int',
		'extracted_author_data' => 'int',
		'extracted_wikipedia_info' => 'int',
		'preprocessing' => 'int'
	];

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'url',
		'type',
		'visited',
		'extracted_wikipedia_url',
		'extracted_museo_del_prado_url',
		'wikidata_labels',
		'extracted_museo_del_prado_info',
		'extracted_author_data',
		'extracted_wikipedia_info',
		'preprocessing',
		'date_added'
	];
}
