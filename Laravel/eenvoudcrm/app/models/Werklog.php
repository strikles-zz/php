<?php

class Werklog extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'worklogs';
	protected $guarded = ['id'];

	protected $dates = ['deleted_at'];

	public function company() {
		return $this->belongsTo('Company');
	}

	public function project() {
		return $this->belongsTo('Project');
	}

	public function strippenkaart() {
		return $this->belongsTo('Strippenkaart');
	}

	// public function strippenkaarten() {
	// 	return $this->belongsTo('Strippenkaart');
	// }

	public function user() {
		return $this->belongsTo('User');
	}

	public function getNameAttribute() {
		return $this->project->name;
	}
}

?>