<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Fields list for mass assignment
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
    ];

    public $timestamps = false;
}
