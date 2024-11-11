<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\User;
use App\Models\FinalResult;
use App\Models\QuestionChoice;



class ChoiceResult extends Model
{
    use HasFactory;
    protected $fillable=[ 'choices',
    'exam_id',
    'user_id',
    'result'];


protected $casts = [
    'choices' => 'array',
];


    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
