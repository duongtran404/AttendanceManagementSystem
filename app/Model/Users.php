<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
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
}
