<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'note', 'status'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    const STATUSES = [
        '0'  => 'Активный',
        '1'  => 'Завершен'
    ];

}
