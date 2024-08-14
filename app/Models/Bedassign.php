<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedassign extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenantprofile_id', // Make sure to include this in fillable attributes
        'room_no',
        'bed_no',
        'start_date',
        'due_date'
    ];

    public function tenantprofile()
    {
        return $this->belongsTo(Tenantprofile::class);
    }

    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }
}
