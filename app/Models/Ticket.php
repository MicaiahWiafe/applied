<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickets';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'user_id', 'active', 'movie_id', 
    ];


    // public function user(){
    //     return this->belongsTo('User');
    // }

}
