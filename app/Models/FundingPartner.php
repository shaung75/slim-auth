<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Funding Partners Model
 *
 * @author Shaun Gill
 */
class FundingPartner extends Model
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

	public function category() {
		return $this->belongsTo('App\Models\FundingPartnerCat', 'funding_partner_categories_id');
	}

	public function fundingSource()
	{
		return $this->belongsToMany('App\Models\FundingSource', 'funding_sources_has_funding_partners', 'funding_sources_id', 'funding_partners_id');
	}
}