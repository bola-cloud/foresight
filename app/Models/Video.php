<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_video', 'description','link' ,'lecture_id'
    ];
    public function lecture()
    {
        return $this->belongsTo(Lecture::class,'lecture_id');
    }
}
