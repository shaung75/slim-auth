<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Trusts Model
 *
 * @author Shaun Gill
 */
class Trust extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'trusts';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'trust',
	];
}