<?php

use Illuminate\Database\Eloquent\Collection;

class Events extends \Eloquent {

    use SoftDeletingTrait;

    protected $protected = ['id'];
    //protected $fillable = ['name'];

    public function users() {
        return $this->belongsToMany('User', 'events_users_xref', 'event_id', 'user_id');
    }

    public function promoters() {

        return $this->users()->whereHas('roles', function($q) {
            $q->where('assigned_roles.role_id', 4);
        });
    }


    public function ticket_types() {
        return $this->hasMany('TicketType', 'events_id', 'id');
    }

    public function contacts() {
        return $this->belongsToMany('Contact', 'events_contacts_xref', 'event_id', 'contact_id');
    }

    public function venues() {
        return $this->belongsToMany('Venue', 'events_venues_xref', 'event_id', 'venue_id');
    }

    public function companies() {
        return $this->belongsToMany('Company', 'events_companies_xref', 'event_id', 'company_id');
    }

    public function date() {
        return $this->belongsToMany('Dates', 'events_dates_xref', 'event_id', 'date_id');
    }

    public function currency() {
        return $this->belongsTo('Currency', 'currency_id');
    }

    public function getProposedOpeningTimeAttribute() {
        return date('H:i', strtotime($this->attributes['proposed_opening_time']));
    }

    public function getProposedClosingTimeAttribute() {
        return date('H:i', strtotime($this->attributes['proposed_closing_time']));
    }

    public function getAverageRatingAttribute() {
        $rating_count = 0;
        $rating_score = 0;
        $scores = ['eval_financial_score', 'eval_marketing_score', 'eval_travel_score', 'eval_production_score'];
        foreach ($scores as $score) {
            if ($this->attributes[$score]) {
                $rating_count++;
                $rating_score += $this->attributes[$score];
            }
        }

        return $rating_count ? $rating_score / $rating_count : null;
    }

}
