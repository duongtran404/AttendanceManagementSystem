<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        "user_id","status","notes","lesson_id",
    ];
    public function lesson(){
        return $this->belongsTo(Lesson::class,"lesson_id","id");
    }
}
