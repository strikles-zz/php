<?php

class Picture extends \Eloquent {

    use SoftDeletingTrait;

    protected $protected = ['id'];
    protected $table = 'pictures';

    /**
     * Object-relational model: Vesting article
     * @return object Article
     */
    public function picturable()
    {
        return $this->morphTo();
    }

    public function getNameAttribute() {
        return $this->filename;
    }

}