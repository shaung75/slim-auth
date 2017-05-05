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
		'habitat_categories',
	];
}