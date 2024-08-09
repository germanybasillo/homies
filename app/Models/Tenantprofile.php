<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenantprofile extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'email',
        'contact',
        'address',
        'gender',
        'profile',
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
