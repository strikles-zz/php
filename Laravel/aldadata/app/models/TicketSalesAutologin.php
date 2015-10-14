<?php

class TicketSalesAutologin extends Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	protected $table = 'missingticketsalesautologin';
	protected $fillable = ['users_id', 'events_id', 'token'];

	public function user()
	{
		return $this->belongsTo('User', 'users_id');
	}

	public function event()
	{
		return $this->belongsTo('Events', 'events_id');
	}
}
