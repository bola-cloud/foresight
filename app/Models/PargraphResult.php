<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\User;
class PargraphResult extends Model
{
    use HasFactory;

    protected $fillable=[ 'answers',
    'exam_id',
    'user_id',
    'result'];

    protected $casts = [
        'answers' => 'array',
    ];
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
