<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use App\Models\Scheme;
use App\Models\FundingSource as f;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

/**
 * SchemeController Class
 *
 * @author Shaun Gill
 */
class SchemeController extends Controller
{
	/**
	 * Displays Add Scheme View
	 */
	public function index($request, $response)
	{
		return $this->view->render($response, 'schemes/add.twig');
	}

	public function addScheme($request, $response)
	{
		/*echo '<pre>';
		print_r($request->getParams());
		die();
		*/
		$validation = $this->validator->validate($request, [
			'schemeName' => v::notEmpty(),
		]);

		if($validation->failed()) {
			return $response->withRedirect($this->router->pathFor('scheme.add'));
		}

		$scheme = new Scheme();

		// Form Fields
		$scheme->schemeName = $request->getParam('schemeName');
		$scheme->aims = $request->getParam('aims');
		$scheme->deliveryLandOwnerAdvice = $request->getParam('deliveryLandOwnerAdvice');
		$scheme->deliveryAgriEnvironmentalSchemes = $request->getParam('deliveryAgriEnvironmentalSchemes');
		$scheme->deliveryLandAcquisition = $request->getParam('deliveryLandAcquisition');
		$scheme->deliveryGrazingSchemes = $request->getParam('deliveryGrazingSchemes');
		$scheme->deliveryManagementRealignment = $request->getParam('deliveryManagementRealignment');
		$scheme->deliveryCommunityEngagement = $request->getParam('deliveryCommunityEngagement');
		$scheme->deliveryMonitoringDetails = $request->getParam('deliveryMonitoringDetails');
		$scheme->benefitClimateChange = $request->getParam('benefitClimateChange');
		$scheme->benefitWaterQuality = $request->getParam('benefitWaterQuality');
		$scheme->benefitReducedFloodRisk = $request->getParam('benefitReducedFloodRisk');
		$scheme->benefitCarbonStorage = $request->getParam('benefitCarbonStorage');
		$scheme->benefitHabitatProvision = $request->getParam('benefitHabitatProvision');
		$scheme->benefitVolunteeringOpportunities = $request->getParam('benefitVolunteeringOpportunities');
		$scheme->benefitImprovedAccess = $request->getParam('benefitImprovedAccess');
		$scheme->benefitUrbanRegeneration = $request->getParam('benefitUrbanRegeneration');
		$scheme->benefitLocalEconomy = $request->getParam('benefitLocalEconomy');
		$scheme->benefitLocalFoodProduction = $request->getParam('benefitLocalFoodProduction');
		$scheme->benefitSkillsTraining = $request->getParam('benefitSkillsTraining');
		$scheme->benefitEnvironmentalEducation = $request->getParam('benefitEnvironmentalEducation');
		$scheme->benefitGreenTourism = $request->getParam('benefitGreenTourism');
		$scheme->benefitHealth = $request->getParam('benefitHealth');
		$scheme->benefitRecreationalOpportunities = $request->getParam('benefitRecreationalOpportunities');
		$scheme->benefitEmployment = $request->getParam('benefitEmployment');
		$scheme->progressSchemeProgress = $request->getParam('progressSchemeProgress');
		$scheme->progressDeliveryBarrier = $request->getParam('progressDeliveryBarrier');
		$scheme->progressSchemeOutputs = $request->getParam('progressSchemeOutputs');
		$scheme->schemeWebsite = $request->getParam('schemeWebsite');
		$scheme->contactName = $request->getParam('contactName');
		$scheme->contactJobTitle = $request->getParam('contactJobTitle');
		$scheme->contactPhone = $request->getParam('contactPhone');
		$scheme->contactEmail = $request->getParam('contactEmail');
		$scheme->region = $request->getParam('region');
		$scheme->sizeHA = $request->getParam('sizeHA');
		$scheme->gisLayerSupplied = $request->getParam('gisLayerSupplied');
		$scheme->stage = $request->getParam('stage');
		$scheme->startDate = $request->getParam('startDate');
		$scheme->endDate = $request->getParam('endDate');
		$scheme->duration = $request->getParam('duration');
		$scheme->nearestCity = $request->getParam('nearestCity');
		$scheme->localAuthorityAreas = $request->getParam('localAuthorityAreas');
		$scheme->deliveryManagementAgreements = $request->getParam('deliveryManagementAgreements');
		$scheme->benefitAirQuality = $request->getParam('benefitAirQuality');

		$scheme->save();

		//echo '<pre>';
		//print_r($request->getParams());
		//die();

		// Update Relationships...		
		$scheme->trusts()->attach($request->getParam('trust'));
		$scheme->species()->attach($request->getParam('species'));
		$scheme->habitats()->attach($request->getParam('habitats'));
		$scheme->partners()->attach($request->getParam('partners'));
		
		foreach($request->getParam('funding_sources') as $fundingSource) {
			$fs = $scheme->fundingSources()->create($fundingSource);
			$source = f::find($fs->id);
			$source->fundingPartner()->attach($fundingSource['funding_partner']);
		}

		foreach($request->getParam('habitat_restored') as $restoredHabitat) {
			$scheme->restoredHabitats()->create($restoredHabitat);
		}

		foreach($request->getParam('habitat_created') as $createdHabitat) {
			$scheme->createdHabitats()->create($createdHabitat);
		}
		
		//echo '<pre>';
		//print_r($scheme);
		//print_r($request->getParams());
		//die();

		$this->flash->addMessage('info', 'New scheme "'. $request->getParam('schemeName') .'" has been created');

		return $response->withRedirect($this->router->pathFor('scheme.add'));
	}
}
