<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letter extends Model
{
    use HasFactory;

    public function letter_type()
    {
        return $this->belongsTo 
        (latter_type::class,'letter_type_id');
    }
    
}
