<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Class_ extends Model
{
    use SoftDeletes;


    protected $table = "classes";
    protected $fillable = [
        "name","user_id","begin_date","end_date",
    ] ;
    protected $begin_date = ["begin_date"];

    protected $end_date = ["end_date"];

    public function getDeletedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s d-m-Y');
    }
    
    public function getBeginDateAttribute($begin_date){
        return Carbon::parse($begin_date)->format('d-m-Y');
    }
    public function getEndDateAttribute($end_date){
        return Carbon::parse($end_date)->format('d-m-Y');
    }

    public function lesson(){
        return $this->hasMany(Lesson::class,'class_id','id');
    }

    public  function class_member(){
        return $this->hasMany(Class_member::class,'class_id','id');
    }

    public function class_subject(){
        return $this->hasOne(Class_subject::class,'class_id','id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
