<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'suggest',
        'date',
        'tenant_id' // Add user_id to the fillable array
    ];

    /**
     * The tenant profile belongs to a user.
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function replyowner()
    {
        return $this->hasMany(ReplyOwner::class);
    }
}
