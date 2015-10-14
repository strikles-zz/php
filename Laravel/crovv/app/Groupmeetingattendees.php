<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Groupmeetingattendees extends SleepingOwlModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groupmeetingattendees';
	protected $guarded = array('_token');

	public function groupmeeting()
	{
		return $this->belongsTo('\App\Groupmeeting');
	}
}
