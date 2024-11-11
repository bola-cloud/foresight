<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ChoiceResult;
use App\Models\Exam;
class FinalResult extends Model
{
    use HasFactory;

    protected $fillable=[
    'exam_id',
    'user_id',
    'result','show_Result'];
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

}

