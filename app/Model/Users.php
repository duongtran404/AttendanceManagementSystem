<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'name', 'email', 'password','role','phone_number','location','gerden','status','title','notes','department'
    ];
    
    public function class(){
        return $this->hasMany(Class_::class,'user_id','id');
    }
    
    public function class_member(){
        return $this->hasMany(Class_member::class,'user_id','id');
    }
    public function classes(){
        return $this->belongsToMany(Class_::class,'class_member','class_id','user_id');
    }
}
