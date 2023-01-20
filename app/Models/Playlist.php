<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'image',
        'user_id',
        'status'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    
    
}
