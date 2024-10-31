<?php

namespace App\Models;

use Sushi\Sushi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reaction extends Model
{
    use HasFactory, Sushi;

    protected $guarded = [];

    protected $rows = [
        ['id' => 1, 'emoji' => 'thumbsup'],
        ['id' => 2, 'emoji' => 'thumbsup'],
        ['id' => 3, 'emoji' => 'thumbsup'],
        ['id' => 4, 'emoji' => 'thumbsup'],
        ['id' => 5, 'emoji' => 'thumbsup'],
        ['id' => 6, 'emoji' => 'thumbsup'],
        ['id' => 7, 'emoji' => 'thumbsup'],
        ['id' => 8, 'emoji' => 'thumbsup'],
        ['id' => 9, 'emoji' => 'thumbsup'],
        ['id' => 10, 'emoji' => 'thumbsup'],
        ['id' => 11, 'emoji' => 'thumbsup'],
    ];
}
