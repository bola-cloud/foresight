<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuestion extends Model
{
    use HasFactory;

    protected $fillable=[
        'content',
        'user_id',
        'unit_id',
    ];

    public function answers()
    {
        return $this->hasMany(QuestionAnswer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
