<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];
    protected $table = 'post'; 
    // ^^^Laravel follows a convention and it expects your table to be plural from the model name.

    public function userPost() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
