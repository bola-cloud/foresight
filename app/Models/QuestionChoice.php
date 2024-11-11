<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrueAnswer;
use App\Models\Exam;
use App\Models\Block;
class QuestionChoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'image',
        'question',
        'a',
        'b',
        'c',
        'd',
        'mark_question',
    ];


    public function trueanswer(){

        return $this->hasOne(TrueAnswer::class,'question_id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class,'block_id');
    }

}
