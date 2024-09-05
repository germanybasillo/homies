<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replyowner extends Model
{
    protected $fillable = [
        'reply',
        'status',
        'suggestion_id',
    ];

    public function suggestion()
    {
        return $this->belongsTo(Suggestion::class);
    }

}
