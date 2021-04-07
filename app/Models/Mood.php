<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mood extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'level',
        'message'
    ];
}
