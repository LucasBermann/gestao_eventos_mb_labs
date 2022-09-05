<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Intermediary\IModel;

class Log extends IModel
{
    use HasFactory;

    protected $fillable = [
        'message',
        'code',
        'file',
        'line'
    ];
}
