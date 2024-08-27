<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'room_no',
        // 'description',
        'selected_id',
        'start_date',
        'due_date',
        // 'profile',
        'tenant_id' // Add user_id to the fillable array
    ];

    /**
     * The tenant profile belongs to a user.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function selected()
    {
        return $this->belongsTo(Selected::class);
    }

}
