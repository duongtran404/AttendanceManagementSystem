<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Class_ extends Model
{
    protected $table = "classes";
    protected $fillable = [
        "name","user_id","begin_date","end_date",
    ] ;
    
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
        return $this->belongsTo(User::class);
    }

}
