<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    public $timestamps = false;
    /**
     * Fields list for mass assignment
     * @var array
     */
    protected $fillable = [
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
