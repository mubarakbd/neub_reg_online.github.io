<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public function coursedetalis(){
        return $this->belongsTo(Coursedetalis::class,'subject_id','id');
        
      }
      public function semesters(){
        return $this->belongsTo(Semester::class,'semester_id','id');
      }
}
