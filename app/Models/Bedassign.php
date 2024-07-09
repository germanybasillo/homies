<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get the Roon 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class,'room_id','id');
    }
    
    /**
     * Get the Roon 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bed(): BelongsTo
    {
        return $this->belongsTo(Bed::class,'bed_id','id');
    }
}
