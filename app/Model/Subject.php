<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        "name","credit","notes"
    ] ;
    public function class(){
        return $this->hasMany(Class_subject::class,"subject_id","id");
    }
}
