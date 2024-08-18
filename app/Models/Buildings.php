<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function camp(){
        return $this->belongsTo(Camp::class,'camp_id');
    }
    public function rooms(){
        return $this->belongsTo(Room::class,'rooms_id');
    }
}
