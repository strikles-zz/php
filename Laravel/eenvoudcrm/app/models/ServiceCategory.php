<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ServiceCategory extends Eloquent {

	protected $table = 'service_categories';
	public $timestamps = true;

	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	protected $fillable = array('Name');

}