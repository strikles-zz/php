<?php

class Company extends \Eloquent {

    use SoftDeletingTrait;

    protected $protected = ['id'];
    protected $fillable = ['name', 'references', 'notes'];

    public function address() {
        return $this->belongsTo('Address');
    }

    public function contacts() {
        return $this->belongsToMany('Contact', 'companies_contacts_xref', 'company_id', 'contact_id');
    }

    public function venues() {
        return $this->belongsToMany('Venue', 'companies_venues_xref', 'company_id', 'venue_id');
    }

    public function events() {
        return $this->belongsToMany('Events', 'events_companies_xref', 'company_id', 'event_id');
    }

    public function users() {
        return $this->belongsToMany('User', 'companies_users_xref', 'company_id', 'user_id');
    }

    public function promoters() {

        return $this->users()->whereHas('roles', function($q) {
            $q->where('assigned_roles.role_id', 4);
        });
    }

}
