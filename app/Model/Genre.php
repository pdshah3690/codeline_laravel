<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * Fields list for mass assignment
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
}
