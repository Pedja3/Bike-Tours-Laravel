<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'difficulty', 'user_id', 'distance', 'location'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
