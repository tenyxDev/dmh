<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketPoint extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'point_name', 'message', 'proceed', 'status'
    ];
}
