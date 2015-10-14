<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Groupinvite extends SleepingOwlModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public $timestamps = false;
	protected $table      = 'groupinvites';
	protected $guarded    = array('_token');
}
