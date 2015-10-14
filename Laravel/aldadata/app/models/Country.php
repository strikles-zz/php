<?php

class Country extends \Eloquent {

	use SoftDeletingTrait;

	protected $table = 'countries';
}