<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
class Password_Exams extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'passwords',

    ];

    protected $casts = [
        'passwords' => 'array',
    ];
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
}
