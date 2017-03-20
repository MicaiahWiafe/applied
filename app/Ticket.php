<?php

namespace Silverbird;

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

}
