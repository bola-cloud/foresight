<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'category_id', // Ensure category_id is fillable
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
