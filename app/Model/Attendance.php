<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        "user_id","status","notes","lesson_id",
    ];
    // protected $dates = ["updated_at"];

    // public function getUpdatedAtAttribute($dates){
    //     return Carbon::parse($dates)->format('H:i:s d/m/Y');
    // }
    
    public function lesson(){
        return $this->belongsTo(Lesson::class,"lesson_id","id");
    }
}
