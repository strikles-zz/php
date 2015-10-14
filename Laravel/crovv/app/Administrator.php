<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Administrator extends SleepingOwlModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'administrators';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = ['title', 'content'];
	protected $guarded = array('_token, password_confirmation');

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
