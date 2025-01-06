<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class WordController extends Controller
{
    public function showWords()
    {
        return view('words');
    }

    public function showEditWord(Word $word)
    {
        return view('word', ['word' => $word]);
    }

    public function createWord(Request $request)
    {
        $request->merge([
            'text' => strtolower($request->text),
        ]);
        $incomingFields = $request->validate([
             'text' => ['required', 'min:3', 'max:30', Rule::unique('words', 'text')],
         ]);
        $newWord = [
            'text' => strip_tags($incomingFields['text']),
            'isTopical' => $request->has('isTopical'),
            'creator' => auth()->id()
        ];
        try {
            DB::beginTransaction();
            $word = Word::create($newWord);
            DB::commit();
            if ($word) {
                return back()->with('success', 'Word saved. Thanks!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        } catch (QueryException $qe) {
            Log::error($qe->getMessage());
        }
        return back()->withInput()->withErrors('Error: ' . $e->getMessage());
    }

    public function updateWord(Word $word, Request $request)
    {
        $request->merge([
            'text' => strtolower($request->text),
        ]);
        $incomingFields = $request->validate([
             'text' => ['required', 'min:3', 'max:30', Rule::unique('words', 'text')->ignore($word->id)],
         ]);
        $updatedWord = [
            'text' => strip_tags($incomingFields['text']),
            'isTopical' => $request->has('isTopical'),
            'editor' => auth()->id()
        ];
        try {
            DB::beginTransaction();
            $word->update($updatedWord);
            DB::commit();
            if ($word) {
                return redirect('/words')->with('success', 'Word saved. Thanks!');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        } catch (QueryException $qe) {
            Log::error($qe->getMessage());
        }
        return back()->withInput()->withErrors('Error: ' . $e->getMessage());
    }
}
