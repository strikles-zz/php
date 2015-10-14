<?php

class Contact extends Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	//protected $appends = array('fullName');

	public function address() {
		return $this->belongsTo('Address');
	}

	public function venues() {
		return $this->belongsToMany('Venue', 'venues_contacts_xref', 'contact_id', 'venue_id');
	}

	public function companies() {
		return $this->belongsToMany('Company', 'companies_contacts_xref', 'contact_id', 'company_id');
	}

	public function events() {
		return $this->belongsToMany('Events', 'events_contacts_xref', 'contact_id', 'event_id');
	}

	public function getfullNameAttribute() {
		return $this->first_name . ' ' . $this->last_name;
	}

	public function getNameAttribute() {
		return $this->first_name . ' ' . $this->last_name;
	}

	public function type() {
		return $this->belongsTo('ContactType', 'contact_type_id', 'id');
	}

}
