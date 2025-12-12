<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use Notifiable;

    // Use this guard for staff authentication
    protected $guard = 'staff';

    // Fillable attributes
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // staff, manager, admin
    ];

    // Hidden attributes (for security)
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
