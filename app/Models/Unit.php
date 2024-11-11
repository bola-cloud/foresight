<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use App\Models\Exam;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_type',
        'cost'
    ];

    public function videos()
    {
        return $this->belongsToMany(Video::class,'video_units');
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class,'unit_exams');
    }
    public function files()
    {
        return $this->belongsToMany(Files::class,'file_units','unit_id','file_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class,'student_unit');
    }
    public function lectures()
    {
        return $this->hasMany(Lecture::class,'unit_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class,'unit_id');
    }
}
