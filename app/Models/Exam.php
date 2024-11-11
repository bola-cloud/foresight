<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\ChoiceResult;
use App\Models\PargraphResult;
use App\Models\FinalResult;


class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_exam',
        'year_type',
        'show_exam',
        'time'
    ];
    public function units()
    {
        return $this->belongsToMany(Unit::class,'unit_exams');
    }

    public function passwords()
    {
        return $this->hasOne(Password::class,'exam_id');
    }

    public function choiceresult()
    {
        return $this->hasMany(ChoiceResult::class,'exam_id');
    }
    public function pargraphresult()
    {
        return $this->hasMany(PargraphResult::class,'exam_id');
    }


    public function finalresults()
    {
        return $this->hasMany(FinalResult::class,'exam_id');
    }
}
