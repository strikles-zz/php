<?php

class TaskGroup extends Eloquent {

    use SoftDeletingTrait;
    protected $table = 'taskgroups';

    protected $protected = ['id'];
}
