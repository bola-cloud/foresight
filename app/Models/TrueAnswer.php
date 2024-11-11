<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionChoice;

class TrueAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'ans',
    ];

    public function question(){

        return $this->belongsTo(QuestionChoice::class,'question_id');
    }
}
