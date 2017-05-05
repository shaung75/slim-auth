<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Habitats Model
 *
 * @author Shaun Gill
 */
class CreatedHabitat extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'created_habitats';

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
}