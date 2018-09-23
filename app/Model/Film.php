<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * Fields list for mass assignment
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'realease_date',
        'rating',
        'ticket_price',
        'slug',
        'country_id',
        'photo',
    ];

    //////////////////
    // Relationship //
    //////////////////
    /**
     * Creator of function
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function filmGenre()
    {
    	return $this->hasMany(FilmGenre::class);
    }
}
