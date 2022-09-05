<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Intermediary\UserAuth;

class User extends UserAuth
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'birth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $appends = [
    //     'events',
    //     'company',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // public function getCompanyAttribute()
    // {
    //     return $this->company()->get()->first();
    // }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    // public function getEventsAttribute()
    // {
    //     return $this->events()->get()->all();
    // }

    public function events()
    {
        return $this->hasMany(Event::class, 'user_registration_id');
    }
}
