<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeVideo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'status',
        'link',
        'year_type',   
    ];
    public function getEmbedLinkAttribute()
    {
        // Extract the video ID from the YouTube URL
        if (preg_match('/youtu\.be\/([^\?]*)/', $this->link, $matches) || preg_match('/youtube\.com\/watch\?v=([^\&]*)/', $this->link, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        return null;
    }
}
