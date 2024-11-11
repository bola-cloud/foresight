<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QuestionChoice;
class Block extends Model
{
    use HasFactory;
    protected $fillable=['title', 'block',
    'exam_id',
    ];
    public function choices()
    {
        return $this->hasMany(QuestionChoice::class,'block_id');
    }
}
