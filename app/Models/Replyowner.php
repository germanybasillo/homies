<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replyowner extends Model
{
    protected $fillable = [
        'tenantprofile_id', // Make sure to include this in fillable attributes
        'suggestion_id',
        'reply',
        'status',
    ];

    public function tenantprofile()
    {
        return $this->belongsTo(Tenantprofile::class);
    }
    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }

}
