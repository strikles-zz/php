<?php

class TicketType extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'event_ticket_types';
	protected $protected = ['id'];

    public function sold() {
        return $this->hasMany('TicketSold', 'event_ticket_types_id');
    }
}
