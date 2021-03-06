<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Habitats Model
 *
 * @author Shaun Gill
 */
class Habitat extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'habitats';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'habitat',
		'habitat_categories_id',
	];

	public function category() {
		return $this->belongsTo('App\Models\Habitatcat', 'habitat_categories_id');
	}

	public function restoredHabitat() {
		return $this->hasMany('App\Models\RestoredHabitat');
	}
	
	public function createdHabitat() {
		return $this->hasMany('App\Models\CreatedHabitat');
	}
}