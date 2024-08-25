<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;
    protected $fillable = [
        'selectbed_id',
        'daily_rate',
        'monthly_rate',
        'tenant_id' // Add user_id to the fillable array
    ];

    /**
     * The tenant profile belongs to a user.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function selectbed()
    {
        return $this->belongsTo(Selectbed::class);
    }
}
