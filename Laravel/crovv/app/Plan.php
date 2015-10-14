<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Plan extends SleepingOwlModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'plans';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['title', 'content'];
	protected $guarded = array('_token');
}
