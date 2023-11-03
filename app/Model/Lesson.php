<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'begin_time','class_id','location_id'
    ];
    protected $begin_time = ['begin_time'];

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format('H:i:s d/m/Y');
    }

    public function getBeginTimeAttribute($begin_time){
        return Carbon::parse($begin_time)->format('H:i d/m/Y');
    }

    public function attendance(){
        return $this->hasOne(Attendance::class,'lesson_id','id');
    }
    public function class(){
        return $this->belongsTo(Class_::class,'class_id','id');
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }

}
