<?php

class Company extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'companies';
	protected $guarded = ['id'];

	protected $dates = ['deleted_at'];

	public function meta() {
		return $this->hasMany('CompanyMeta');
	}

	public function getNameAttribute() {
		return $this->bedrijfsnaam;
	}
}