<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Funding Partners Model
 *
 * @author Shaun Gill
 */
class FundingPartners extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'funding_partners';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'funding_partner',
		'funding_partner_categories_id',
	];
}