<?php

class TaskNotificationAutologin extends Eloquent {

	use SoftDeletingTrait;

	protected $protected = ['id'];
	protected $table = 'tasknotificationsautologin';
	protected $fillable = ['users_id', 'events_id', 'taskevents_id', 'token'];

	public function user()
	{
		return $this->belongsTo('User', 'users_id');
	}

	public function event()
	{
		return $this->belongsTo('Events', 'events_id');
	}

	public function taskevent()
	{
		return $this->belongsTo('TaskEvent', 'taskevents_id');
	}
}
