<?php

namespace App\Http\Controllers;

use App\Models\{Word, Category, CategoryWord};
use Illuminate\Http\Request;

class CategoryWordController extends Controller
{
    protected $word;
    protected $category;

    private array $rules = [
            'word_id' => 'required|exists:words,id',
            'category_id' => 'required|exists:categories,id',
            'difficulty_override' => 'nullable|numeric',
            'example_sentence' => 'nullable|string',
        ];

    // Show the form for creating a new CategoryWord instance
    public function showCreate(Request $request)
    {
        $wordId = $request->query('word');
        $categoryId = $request->query('category');
        $returnTo = $request->query('returnTo');

        $word = Word::findOrFail($wordId);
        $category = Category::findOrFail($categoryId);
        return view('category_word.create', [
            'word' => $word,
            'category' => $category,
            'returnTo' => $returnTo,
        ]);
    }

    // Store the new CategoryWord instance
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        CategoryWord::create($validated);

        // return to either the edit word page, or edit category page depending on where we came from
        $returnTo = $request->input('return_to');
        if ($returnTo === 'word') {
            return redirect()->route('word.edit', $validated['word_id'])->with('success', 'successfully added to that category!');
        } else {
            return redirect()->route('category.edit', $validated['category_id'])->with('success', 'word added successfully!');
        }
    }

    public function showEdit(Request $request)
    {
        $wordId = $request->route('word');
        $categoryId = $request->route('category');
        $returnTo = $request->query('returnTo');

        $word = Word::findOrFail($wordId);
        $category = Category::findOrFail($categoryId);
        return view('category_word.edit', [
            'word' => $word,
            'category' => $category,
            'returnTo' => $returnTo,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate($this->rules);

        $categoryWord = CategoryWord::where('word_id', $validated['word_id'])
            ->where('category_id', $validated['category_id'])
            ->firstOrFail();

        $categoryWord->update($validated);

        // return to either the edit word page, or edit category page depending on where we came from
        $returnTo = $request->input('return_to');
        if ($returnTo === 'word') {
            return redirect()->route('word.edit', $validated['word_id'])->with('success', 'successfully updated that category!');
        } else {
            return redirect()->route('category.edit', $validated['category_id'])->with('success', 'word updated successfully!');
        }
    }
}
