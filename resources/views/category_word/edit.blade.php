{{-- TODO: make this less repetitive (see create.blade.php) --}}
<x-layouts.app>
    <div>
        <h1>The word "{{ $word->text }}" is in the category "{{ $category->name }}"</h1>
        <form action="{{ route('category_word.update', ['category' => $category->id, 'word' => $word->id]) }}"
            method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="word_id" value="{{ $word->id }}">
            <input type="hidden" name="category_id" value="{{ $category->id }}">
            <input type="hidden" name="return_to" value="{{ $returnTo }}">

            <div class="mb-3">
                <label for="difficulty_override">Difficulty Override</label>
                <input type="number" id="difficulty_override" name="difficulty_override">
            </div>

            <div class="mb-3">
                <label for="example_sentence" class="form-label">Example Sentence</label>
                <textarea id="example_sentence" name="example_sentence" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layouts.app>
