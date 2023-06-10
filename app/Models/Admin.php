<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * That attributes that should be mass assignable
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password'];
    /**
     * That attributes that should be hidden for serialization
     * @var array<int, string>
     */
    protected $hidden = ['password'];
    /**
     * The attributes that should be cast
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed'
    ];
}
