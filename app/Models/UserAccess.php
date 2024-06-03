<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    use HasFactory;

    protected $table = 'user_access';

    protected $fillable = ['user_id', 'permission'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
