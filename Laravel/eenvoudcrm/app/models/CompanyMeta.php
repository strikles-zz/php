<?php

class CompanyMeta extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'companymeta';
	protected $guarded = ['id'];

	protected $dates = ['deleted_at'];

}