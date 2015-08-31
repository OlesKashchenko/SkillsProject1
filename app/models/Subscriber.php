<?php
class Subscriber extends Eloquent
{

    protected $table = 'subscribers';
    protected $fillable = array(
        'email',
    );
}