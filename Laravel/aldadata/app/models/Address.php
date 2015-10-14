<?php

class Address extends \Eloquent {

    use SoftDeletingTrait;

    protected $protected = ['id'];
    protected $fillable = ['address'];
    protected $table = 'adresses';

    public function country() {
        return $this->belongsTo('Country');
    }

    public function getNameAttribute() {
        return $this->address;
    }
}
