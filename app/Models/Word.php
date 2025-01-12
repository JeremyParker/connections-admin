<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'isTopical',
        'creator',
    ];

    /**
     * The categories that belong to the word.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_word', 'word_id', 'category_id')
                    ->withPivot('difficulty_override', 'example_sentence', 'used_time', 'rejected_time')
                    ->withTimestamps();
    }

    public function categoryWords()
    {
        return $this->hasMany(CategoryWord::class);
    }
}
