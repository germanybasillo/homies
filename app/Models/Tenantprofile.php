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
        'profile'
    ];
    
}
