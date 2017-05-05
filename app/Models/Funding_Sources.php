<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Funding Sources Model
 *
 * @author Shaun Gill
 */
class FundingSources extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'funding_sources';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'amount',
		'timescale',
		'scheme_id',
	];
}