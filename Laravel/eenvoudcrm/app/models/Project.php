<?php

class Project extends \Eloquent {
    use SoftDeletingTrait;

    protected $table = 'projects';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function company() {
        return $this->belongsTo('Company');
    }
}
