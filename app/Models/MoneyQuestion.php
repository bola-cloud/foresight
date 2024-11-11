<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MoneyBlock;
class MoneyQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'a',
        'b',
        'c',
        'd',
        'answer',
        'block_id',
        'type',
        'trueanswer',
        'year_type'
    ];
    public function block()
    {
        return $this->belongsTo(MoneyBlock::class,'block_id');
    }
}
