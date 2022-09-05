<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Intermediary\IModel;

class Event extends IModel
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

    public function userRegistration()
    {
        return $this->belongsTo(User::class, 'user_registration_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
