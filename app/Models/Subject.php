<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function course_offers()
    {
        return $this->hasMany(CourseOffer::class , "subject_id", "id");
    }
}
