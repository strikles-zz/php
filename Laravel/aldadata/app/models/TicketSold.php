<?php

class TicketSold extends \Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	protected $table = 'event_tickets_sold';

	protected $fillable = array('id', 'event_ticket_types_id', 'num_sold', 'week', 'year', 'sale_date');

}
