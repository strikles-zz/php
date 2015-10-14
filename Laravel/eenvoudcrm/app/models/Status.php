<?php

class Status extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'statuses';
	protected $guarded = ['id'];
	protected $dates = ['deleted_at'];
}