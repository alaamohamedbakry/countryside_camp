<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_camp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function camp(){
        return $this->belongsTo(Camp::class);
    }
    public function rooms(){
        return $this->belongsTo(Room::class);
    }
    public function user_phone(){
        return $this->hasMany(User_phone::class);
    }

}
