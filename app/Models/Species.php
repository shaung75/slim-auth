<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Species Model
 *
 * @author Shaun Gill
 */
class Species extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'species';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'species',
	];
}