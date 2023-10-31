<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'begin_time','class_id','location_id'
    ];
//    public function info_class(){
//        return $this->hasOneThrough('App\Model\Classes'
//        , 'App\Model\Class_member',
//        'class_id',
//        'class_member_id',
//        'id',
//        'id'
//    );
//    }
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
