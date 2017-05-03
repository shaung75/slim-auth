<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Tests Model
 *
 * @author Shaun Gill
 */
class Test extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'tests';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'field1',
		'field2',
	];

	public function trusts()
	{
		return $this->belongsToMany('App\Models\Trust');
	}
}