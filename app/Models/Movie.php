<?php

namespace Silverbird;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates what feature of the movie to search the database with.
     *
     * @var keyword
     */    
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                    ->orWhere("director", "LIKE", "%$keyword%")
                    ->orWhere("cast", "LIKE", "%$keyword%")
                    ->orWhere("genre", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
