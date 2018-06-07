<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UrlsRelation
 * 
 * @property int $id_wikidata
 * @property int $id_wikipedia
 * @property int $id_museodelprado
 * @property int $visited
 *
 * @package App\Models
 */
class UrlsRelation extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_wikidata' => 'int',
		'id_wikipedia' => 'int',
		'id_museodelprado' => 'int',
		'visited' => 'int'
	];

	protected $fillable = [
		'visited'
	];
}
