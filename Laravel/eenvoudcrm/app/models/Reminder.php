<?php

class Reminder extends \Eloquent {
    use SoftDeletingTrait;

    protected $table = 'reminders';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function project() {
        return $this->belongsTo('Project');
    }

    public function user() {
        return $this->belongsTo('User');
    }
}
