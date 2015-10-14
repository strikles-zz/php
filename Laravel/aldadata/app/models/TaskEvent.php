<?php

class TaskEvent extends Eloquent {

    use SoftDeletingTrait;
    protected $table = 'taskevents';

    protected $protected = ['id'];
    //public function taskfiles() {
    //    return $this->hasMany('TaskFile', 'taskevents_id', 'id');
    // }
}
