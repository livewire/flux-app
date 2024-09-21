<?php

namespace App\Models;

use Sushi\Sushi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory, Sushi;

    protected $guarded = [];

    protected $rows = [
        ['id' => 1, 'name' => 'Derice Bannock', 'email' => 'derice.bannock@hotmail.com', 'role' => 'admin', 'team_id' => 1],
        ['id' => 2, 'name' => 'Sanka Coffie', 'email' => 'sanka.coffie@hotmail.com', 'role' => 'editor', 'team_id' => 1],
        ['id' => 3, 'name' => 'Yul Brenner', 'email' => 'yul.brenner@hotmail.com', 'role' => 'viewer', 'team_id' => 1],
        ['id' => 4, 'name' => 'Junior Bevil', 'email' => 'junior.bevil@hotmail.com', 'role' => 'viewer', 'team_id' => 1],
    ];

    public function roleLabel()
    {
        return ucfirst($this->role);
    }

    public function roleColor()
    {
        return match ($this->role) {
            'admin' => 'green',
            'editor' => 'yellow',
            'viewer' => 'zinc',
            default => 'zinc',
        };
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
