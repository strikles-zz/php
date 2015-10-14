<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Groupmeeting extends SleepingOwlModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groupmeetings';
	protected $guarded = array('_token');

	public function group()
	{
		return $this->belongsTo('\App\Group');
	}

	public function atendees()
	{
		return $this->belongsToMany('\App\User', 'groupmeetingattendees', 'meeting_id', 'user_id');
	}

	public function date_vstr()
	{
		return date('d M H:i', strtotime($this->meeting_date));
	}

	public function date_str()
	{
		return date('Y-m-d', strtotime('next '.$this->weekdays[(int)$this->meeting_weekday]));
	}

}
