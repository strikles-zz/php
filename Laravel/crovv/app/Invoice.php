<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Invoice extends SleepingOwlModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'invoices';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['title', 'content'];
	protected $guarded = array('_token');

	public static function getList()
	{
		return static::lists('description', 'id');
	}

}
