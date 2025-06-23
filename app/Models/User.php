<?php

namespace App\Models;

// use Illuminate\Contracts\auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    protected  $table = "users";
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'student_id_number',
        'grade_level',
        'program',
        'section',
        'contact_number',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
