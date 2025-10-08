<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
     'thumbnails',
     'title',
     'youtube_url',
    ];
}
