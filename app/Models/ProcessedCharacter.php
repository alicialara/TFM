<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 15:20:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProcessedCharacter
 * 
 * @property int $id
 * @property string $label
 * @property int $id_dbp_urls_wikipedia
 * @property string $url_dbp_urls_wikipedia
 * @property string $url_dbp_urls_museodelprado
 * @property int $id_dbp_urls_museodelprado
 * @property int $id_entity
 * @property int $id_entity_instancia_de
 * @property string $fecha_nacimiento
 * @property string $fecha_fallecimiento
 * @property string $lugar_nacimiento
 * @property string $lugar_fallecimiento
 * @property string $description_mp
 * @property string $description_wp
 * @property string $image
 * @property \Carbon\Carbon $date_added
 *
 * @package App\Models
 */
class ProcessedCharacter extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id_dbp_urls_wikipedia' => 'int',
		'id_dbp_urls_museodelprado' => 'int',
		'id_entity' => 'int',
		'id_entity_instancia_de' => 'int'
	];

	protected $dates = [
		'date_added'
	];

	protected $fillable = [
		'label',
		'id_dbp_urls_wikipedia',
		'url_dbp_urls_wikipedia',
		'url_dbp_urls_museodelprado',
		'id_dbp_urls_museodelprado',
		'id_entity',
		'id_entity_instancia_de',
		'fecha_nacimiento',
		'fecha_fallecimiento',
		'lugar_nacimiento',
		'lugar_fallecimiento',
		'description_mp',
		'description_wp',
		'image',
		'date_added'
	];
}
