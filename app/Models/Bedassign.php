<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedassign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_no',
        'bed_no',
        'start_date',
        'due_date'
    ];
}
