<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'title', 'author', 'plot', 'cover', 'user_id', 'editor_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function editor(){
        return $this->belongsTo(Editor::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
