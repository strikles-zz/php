<?php

class Dates extends \Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	protected $table = 'dates';
	protected $fillable = ['datetime_start', 'datetime_end', 'type', 'description'];

	protected $dates = ['datetime_start', 'datetime_end', 'deleted_at'];
	

}