<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'playlist_id',
        'device_id',
        'pin',
        'zip_code',
        'status'
    ];
}
