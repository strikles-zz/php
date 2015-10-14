<?php

class Currency extends \Eloquent {

    use SoftDeletingTrait;

    protected $protected = ['id'];
    protected $table = 'currencies';
}
