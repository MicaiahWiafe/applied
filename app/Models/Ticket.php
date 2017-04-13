<?php

namespace App;

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
    public $timestamps = false;


    public function user(){
        return this->belongsTo('User');
    }

}
