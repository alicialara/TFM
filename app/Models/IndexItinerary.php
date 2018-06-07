<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class IndexItinerary
 * 
 * @property int $id
 * @property string $dir
 * @property string $ne
 * @property string $names_ne
 * @property string $title
 * @property int $count_paragraphs
 * @property string $html
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class IndexItinerary extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'count_paragraphs' => 'int'
	];

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'dir',
		'ne',
		'names_ne',
		'title',
		'count_paragraphs',
		'html',
		'date_added'
	];
}
