<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    const STATUS_NEW = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;
    const STATUS_COMPLETED = 3;
    const STATUS_FAILED = 4;
    const STATUS_DELETED = 5;

    const STATUSES = [
        'new'       => self::STATUS_NEW,
        'active'    => self::STATUS_ACTIVE,
        'pending'   => self::STATUS_PENDING,
        'completed' => self::STATUS_COMPLETED,
        'failed'    => self::STATUS_FAILED,
        'deleted'   => self::STATUS_DELETED,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_type', 'status', 'ticket_name', 'timer', 'description', 'changed_by',
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
