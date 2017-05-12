<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Habitat Categories Model
 *
 * @author Shaun Gill
 */
class Habitatcat extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'habitat_categories';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'habitat_category',
	];

	public function habitats() {
		return $this->hasMany('App\Models\Habitats', 'habitat_categories_id');
	}
}