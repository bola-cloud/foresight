<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable=[
        'content',
        'student_question_id',
    ];

    public function questions()
    {
        return $this->belongsTo(StudentQuestion::class);
    }
}
