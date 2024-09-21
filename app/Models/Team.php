<?php

namespace App\Models;

use Sushi\Sushi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory, Sushi;

    protected $guarded = [];

    protected $casts = [
        'communication' => 'boolean',
        'marketing' => 'boolean',
        'social' => 'boolean',
        'security' => 'boolean',
    ];

    protected $rows = [
        ['id' => 1, 'name' => 'Jamaican Bobsled Team', 'email' => 'coolrunnings@hotmail.com', 'communication' => true, 'marketing' => true, 'social' => true, 'security' => true],
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
