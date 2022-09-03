<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'documentNumber',
        'phone',
        'user_admin_id',
    ];

    protected $appends = [
        'events',
    ];

    public function userAdmin()
    {
        return $this->belongsTo(Company::class, 'user_admin_id', 'id');
    }

    public function getEventsAttribute()
    {
        return $this->events()->get()->all();
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'company_id');
    }
}
