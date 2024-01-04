<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;
    protected $table = 'register';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'nama',
        'status'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
