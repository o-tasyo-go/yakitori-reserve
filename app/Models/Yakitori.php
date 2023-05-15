<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yakitori extends Model 
{    
    protected $fillable = [ 
        'timeSelect' ,
        'name',  
        'tel',
        'mix',
        'breast',
        'skin',
        'tsukune',
        'bonjiri',
        'others',
        'karaage',
    ];  
}
