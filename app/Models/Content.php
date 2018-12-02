<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
     protected $fillable = [
       'content','subject_id', 'content_type',
    ];


    public function subject(){

        return $this->belongsTo('\App\Models\Subject','subject_id','id');
    }
    public function answers(){

        return $this->hasMany('\App\Models\QuizAnswers','content_id','id');
    }
}
