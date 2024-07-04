<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_no',
        'bed_no',
        'daily_rate',
        'monthly_rate',
        'bed_status'
    ];
    
}
