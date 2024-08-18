<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_phone extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function users_camps(){
        return $this->belongsTo(Users_camp::class);
    }
}
