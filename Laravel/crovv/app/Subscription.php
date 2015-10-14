<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Subscription extends SleepingOwlModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subscriptions';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['title', 'content'];
	protected $guarded = array('_token');

	public function user()
	{
		return $this->belongsTo('\App\User', 'user_id');
	}

	public function invoice()
	{
		return $this->belongsTo('\App\Invoice', 'invoice_id');
	}
}
