<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'employees';

    protected $fillable = [
        'name',
        'email',
        'department'
    ];
}