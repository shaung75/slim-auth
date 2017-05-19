<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Habitats Model
 *
 * @author Shaun Gill
 */
class RestoredHabitat extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'restored_habitats';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'areaHA',
		'date',
		'scheme_id',
		'habitat_id',
	];

	public function scheme() {
		return $this->belongsTo('App\Models\Scheme', 'scheme_id');
	}

	public function habitat()
	{
		return $this->belongsTo('App\Models\Habitat', 'habitat_id');
	}
}