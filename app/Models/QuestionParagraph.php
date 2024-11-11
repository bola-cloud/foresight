<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionParagraph extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'question',
        'answer',
        'mark_question',
    ];
}
