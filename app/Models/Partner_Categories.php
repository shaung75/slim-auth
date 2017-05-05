<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Partner Categories Model
 *
 * @author Shaun Gill
 */
class PartnerCategories extends Model
{
	/**
	 * Database Table
	 * @var string
	 */
	protected $table = 'partner_categories';

	/**
	 * Table fields that can have content added
	 * @var array
	 */
	protected $fillable = [
		'partnerCategory',
	];
}