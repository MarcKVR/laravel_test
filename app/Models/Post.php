<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'category_id', 'description', 'posted', 'image'];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
