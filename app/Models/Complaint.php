<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'categorySelection', 'priorityLevel', 'timeIncident'];
    protected $table = "complaints";
    protected $guarded = "id";

}
