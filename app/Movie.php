<?php

namespace Silverbird;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
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
