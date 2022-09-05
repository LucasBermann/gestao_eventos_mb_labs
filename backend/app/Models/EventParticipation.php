<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Intermediary\IModel;

class EventParticipation extends IModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'isHalfPrice',
        'paymentCard',
        'paymentIdTransaction',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
