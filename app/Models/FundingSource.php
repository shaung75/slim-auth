<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Funding Sources Model
 *
 * @author Shaun Gill
 */
class FundingSource extends Model
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

	public function scheme() {
		return $this->belongsTo('App\Models\Scheme', 'scheme_id');
	}

	public function fundingPartner()
	{
		return $this->belongsToMany('App\Models\FundingPartner', 'funding_sources_has_funding_partners', 'funding_sources_id', 'funding_partners_id');
	}
}