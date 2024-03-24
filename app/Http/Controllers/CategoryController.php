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
       $incomingFields = $request->validate([
            'name' => ['required', 'min:2', 'max:256', Rule::unique('words', 'text')],
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
                return redirect('/categories');
            }
        } catch (Exception $e) {
            \Log::error($e->getMessage());
        } catch (QueryException $qe) {
            \Log::error($qe->getMessage());
        }
        return back()->withInput()->withErrors('Error: ' . $e->getMessage());
     }
}
