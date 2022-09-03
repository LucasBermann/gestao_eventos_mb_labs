<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'category',
        'location',
        'eventDateTime',
        'participantsLimit',
        'price',
        'ageMin',
        'user_registration_id',
        'company_id',
    ];
}
