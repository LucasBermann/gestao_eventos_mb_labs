<?php

namespace App\Models;

use App\Models\Intermediary\IModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends IModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'documentNumber',
        'phone',
        'user_admin_id',
    ];

    // protected $appends = [
    //     'events',
    // ];

    public function userAdmin()
    {
        return $this->belongsTo(User::class, 'user_admin_id', 'id');
    }

    // public function getEventsAttribute()
    // {
    //     return $this->events()->get()->all();
    // }

    public function events()
    {
        return $this->hasMany(Event::class, 'company_id');
    }
}
