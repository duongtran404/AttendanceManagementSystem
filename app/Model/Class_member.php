<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Class_member extends Model
{
    protected $fillable = [
        "class_id","user_id",
    ] ;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function class(){
        return $this->belongsTo(Class_::class);
    }
}
