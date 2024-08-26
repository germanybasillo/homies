<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedassign extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenantprofile_id', // Make sure to include this in fillable attributes
        'room_id',
        'bed_id',
        'selected_id',
        'selectbed_id',
    ];

    public function tenantprofile()
    {
        return $this->belongsTo(Tenantprofile::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }
    public function selected()
    {
        return $this->belongsTo(Selected::class);
    }
    public function selectbed()
    {
        return $this->belongsTo(Selectbed::class);
    }
}
