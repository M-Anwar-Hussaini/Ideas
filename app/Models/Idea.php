<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'user_id'
    ];

    protected $with = ['user:id,name,image', 'comments'];


    public function comments()
    {
        return $this->hasMany(Comment::class, 'idea_id', 'id')->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
