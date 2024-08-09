<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $fillable = [
        'bed_no',
        'daily_rate',
        'monthly_rate',
        'bed_status',
        'tenant_id' // Add user_id to the fillable array
    ];

    /**
     * The tenant profile belongs to a user.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
