<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoneyBlock extends Model
{
    use HasFactory;
    protected $fillable=['title', 'block',
    ];
}
