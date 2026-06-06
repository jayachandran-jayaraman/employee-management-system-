<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class User extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'laraval';

    protected $fillable = [
        'name',
        'email',
        'age'
    ];
}