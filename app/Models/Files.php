<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    
    protected $fillable= ['title','name','path','description','year_type'];


    public function units()
    {
        return $this->belongsToMany(Unit::class,'file_units','file_id','unit_id');
    }
}
