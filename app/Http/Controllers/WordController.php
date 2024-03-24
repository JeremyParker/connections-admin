<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Word;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class WordController extends Controller
{
    public function createWord(Request $request) {
       $incomingFields = $request->validate([
            'text' => ['required', 'min:3', 'max:30', Rule::unique('words', 'text')],
        ]);
        $newWord = [
            'text' => strip_tags(Str::lower($incomingFields['text'])),
            'isTopical' => $request->has('isTopical'),
            'creator' => auth()->id()
        ];
        try {
            DB::beginTransaction();
            $word = Word::create($newWord);
            DB::commit();
            if ($word) {
                return redirect('/');
            }
        } catch (Exception $e) {
            \Log::error($e->getMessage());
        } catch (QueryException $qe) {
            \Log::error($qe->getMessage());
        }
        return back()->withInput()->withErrors('Error: ' . $e->getMessage());
     }
}
