<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $filleable =[
        'name', 
        'birthday',
        'description'
    ];

    public function Animalstype(){

        return $this->belongsTo(AnimalType::class);
    }
 
}
