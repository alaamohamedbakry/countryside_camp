<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function camp(){
        return $this->belongsTo(Camp::class,'camp_id');
    }
    public function users_camps(){
        return $this->hasOne(Users_camp::class,'users_camps_id');
    }
    public function buildings(){
        return $this->hasMany(Buildings::class,'rooms_id');
    }
}
