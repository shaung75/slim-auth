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
	protected $primaryKey = 'idtrusts';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'trust',
	];

	public function schemes()
	{
		return $this->belongsToMany('App\Models\Scheme', 'scheme_trust', 'trust_id', 'scheme_id');
	}
}