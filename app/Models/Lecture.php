<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','unit_id','description','status','image','cost'
    ];
    
    public function videos()
    {
        return $this->hasMany(Video::class,'lecture_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class,'student_lecture');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class,'lecture_id');
    }
}
