<?php

class TaskFile extends Eloquent {

    use SoftDeletingTrait;

    protected $table = 'taskfiles';
    protected $protected = ['id'];

    public function taskevent() {
        return $this->belongsTo('TaskEvent', 'taskevents_id');
    }
    public function task() {
        return $this->belongsTo('TaskEvent', 'taskevents_id');
    }
}
