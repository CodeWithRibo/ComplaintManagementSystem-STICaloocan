<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    use HasFactory;

    protected $table = 'complaints';
    protected $guarded = "id";
    protected $fillable = [
        'category',
        'location',
        'title',
        'description',
        'incident_time',
        'priority',
        'image_path',
        'is_anonymous',
        'type_submit',
        'full_name',
        'student_id_number',
        'email',
        'phone_number',
        'year_section',
        'consent_given',
        'status',
        'complaint_tracker',
        'user_id',
    ];
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
