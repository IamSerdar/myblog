<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'author_id', 'views'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
