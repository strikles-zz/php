<?php

class TaskTemplate extends Eloquent {

	protected $table = 'tasktemplates';

    public function taskgroup() {
        return $this->belongsTo('TaskGroup', 'group_id');
    }
}
