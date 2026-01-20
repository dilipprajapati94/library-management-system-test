<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title','author','genre','isbn','published_at','copies_total','copies_available'];

      protected $casts = [
        'published_at' => 'date',
    ];

    
}
