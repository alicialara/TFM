<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SurveysSuggestion
 * 
 * @property int $id
 * @property int $id_question
 * @property string $suggestion
 * @property string $tags
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class SurveysSuggestion extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id_question' => 'int'
	];

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'id_question',
		'suggestion',
		'tags',
		'date_added'
	];
}
