<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Class_subject extends Model
{
    protected $fillable = [
        "class_id","subject_id",
    ];
    public function subject(){
        return $this->belongsTo(Subject::class,"subject_id","id");
    }
    public function class(){
        return $this->belongsTo(Class_::class,"class_id","id");
    }
}
