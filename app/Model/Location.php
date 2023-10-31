<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable=[
        "name","address",
    ];
    public function lesson(){
        return $this->hasMany(Lesson::class);
    }
}
