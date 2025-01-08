<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'notes',
        'creator',
    ];

    /**
     * Get all the words associated with the category.
     */
    public function words()
    {
        return $this->belongsToMany(Word::class, 'category_word', 'category_id', 'word_id')
                    ->withPivot('difficulty_override', 'example_sentence', 'used_time', 'rejected_time')
                    ->withTimestamps();
    }
}
