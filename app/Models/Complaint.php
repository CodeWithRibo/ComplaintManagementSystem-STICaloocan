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
        'title',
        'description',
        'categorySelection',
        'priorityLevel',
        'timeIncident',
        'user_id',
    ];
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
