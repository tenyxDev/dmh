<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_type', 'ticket_name', 'timer', 'description', 'changed_by',
    ];

    /**
     * Room relation
     *
     * @return HasMany
     */
    public function points()
    {
        return $this->hasMany(TicketPoint::class);
    }
}
