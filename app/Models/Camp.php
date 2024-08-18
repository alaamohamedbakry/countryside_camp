<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function owners(){
        return $this->hasMany(Owner::class);
    }
    public function users_camp(){
        return $this->hasMany(Users_camp::class);
    }
    public function staff(){
        return $this->hasMany(Staff::class);
    }
    public function buildings(){
        return $this->hasMany(Buildings::class,'camp_id');
    }
}
