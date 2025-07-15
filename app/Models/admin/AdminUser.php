<?php

namespace App\Models\admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use Notifiable;

    protected  $table = 'admin_users';
    protected $guarded = 'id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'password'
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
