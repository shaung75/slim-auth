<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Schemes Model
 *
 * @author Shaun Gill
 */
class Scheme extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'schemes';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'schemeName',
		'region',
		'aims',
		'sizeHA',
		'gisLayerSupplied',
		'stage',
		'startDate',
		'endDate',
		'duration',
		'nearestCity',
		'localAuthorityAreas',
		'deliveryLandOwnerAdvice',
		'deliveryManagementAgreements',
		'deliveryAgriEnvironmentalSchemes',
		'deliveryLandAcquisition',
		'deliveryGrazingSchemes',
		'deliveryManagementRealignment',
		'deliveryCommunityEngagement',
		'deliveryMonitoringDetails',
		'benefitClimateChange',
		'benefitWaterQuality',
		'benefitReducedFloodRisk',
		'benefitCarbonStorage',
		'benefitAirQuality',
		'benefitHabitatProvision',
		'benefitVolunteeringOpportunities',
		'benefitImprovedAccess',
		'benefitUrbanRegeneration',
		'benefitLocalEconomy',
		'benefitLocalFoodProduction',
		'benefitSkillsTraining',
		'benefitEnvironmentalEducation',
		'benefitGreenTourism',
		'benefitHealth',
		'benefitRecreationalOpportunities',
		'benefitEmployment',
		'progressSchemeProgress',
		'progressDeliveryBarrier',
		'progressSchemeOutputs',
		'schemeWebsite',
		'contactName',
		'contactJobTitle',
		'contactPhone',
		'contactEmail',
	];

	public function createdHabitats()
	{
		return $this->belongsToMany('App\Models\Created_Habitats');
	}

	public function habitats()
	{
		return $this->belongsToMany('App\Models\Habitat', 'habitat_scheme', 'scheme_id', 'habitat_id');
	}

	public function fundingSources()
	{
		return $this->belongsToMany('App\Models\Funding_Sources');
	}

	public function partners()
	{
		return $this->belongsToMany('App\Models\Partner', 'partner_scheme', 'scheme_id', 'partner_id');
	}

	public function restoredHabitats()
	{
		return $this->belongsToMany('App\Models\Restored_Habitats');
	}

	public function species()
	{
		return $this->belongsToMany('App\Models\Species', 'scheme_species', 'scheme_id', 'species_id');
	}

	public function trusts()
	{
		return $this->belongsToMany('App\Models\Trust', 'scheme_trust', 'scheme_id', 'trust_id');
	}
}