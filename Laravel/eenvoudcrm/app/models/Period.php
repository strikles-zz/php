<?php

class Period extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'invoice_periods';
	protected $guarded = ['id'];
	protected $dates = ['deleted_at'];
}