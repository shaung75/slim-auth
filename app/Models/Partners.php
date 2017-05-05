<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Partners Model
 *
 * @author Shaun Gill
 */
class Partner extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'partners';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'partner',
		'details',
		'partner_categories_id',
	];
}