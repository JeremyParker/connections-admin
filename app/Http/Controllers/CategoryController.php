<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class CategoryController extends Controller
{
    public function createCategory(Request $request) {
        $request->merge([
            'name' => strtolower($request->name),
        ]);
       $incomingFields = $request->validate([
            'name' => ['required', 'min:2', 'max:256', Rule::unique('categories', 'name')],
            'notes' => [],
        ]);
        $newCategory = [
            'name' => strip_tags(Str::lower($incomingFields['name'])),
            'notes' => strip_tags($incomingFields['notes']),
            'creator' => auth()->id()
        ];
        try {
            DB::beginTransaction();
            $category = Category::create($newCategory);
            DB::commit();
            if ($category) {
                return back()->with('success', 'Category saved. Thanks!');
            }
        } catch (Exception $e) {
            \Log::error($e->getMessage());
        } catch (QueryException $qe) {
            \Log::error($qe->getMessage());
        }
        return back()->withInput()->withErrors('Error. See logs');
    }

    public function showCategories() {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('categories', ['categories' => $categories]);
    }

    public function showEditCategory(Category $category) {
        return view('category', ['category' => $category]);
    }

    public function updateCategory(Category $category, Request $request) {
        $request->merge([
            'name' => strtolower($request->name),
        ]);
        $incomingFields = $request->validate([
            'name' => ['required', 'min:2', 'max:256', Rule::unique('categories', 'name')->ignore($category->id)],
            'notes' => [],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['notes'] = strip_tags($incomingFields['notes']);

        $category->update($incomingFields);
        return redirect('/categories')->with('success', 'Category saved. Thanks!');;
    }
}
