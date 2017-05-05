<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Funding Partner Categories Model
 *
 * @author Shaun Gill
 */
class FundingPartnerCategories extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'funding_partner_categories';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'funding_partner_category',
	];
}