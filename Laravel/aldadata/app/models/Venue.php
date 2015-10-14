<?php

class Venue extends \Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];


	public function address() {
		return $this->belongsTo('Address');
	}

	public function contacts() {
		return $this->belongsToMany('Contact', 'venues_contacts_xref', 'venue_id', 'contact_id');
	}
	public function companies() {
		return $this->belongsToMany('Company', 'companies_venues_xref', 'venue_id', 'company_id');
	}

	public function hospitality() {
		return $this->belongsTo('Hospitality', 'id', 'venue_id');
		//return $this->hasOne('Hospitality');
	}

	public function events() {
		return $this->belongsToMany('Events', 'events_venues_xref', 'venue_id', 'event_id');
	}

    public function pictures()
    {
        return $this->morphMany('Picture', 'picturable');
    }

}