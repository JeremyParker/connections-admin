<div>
    <form action="{{ route('words.create') }}" method="POST">
        <input type="text" name="name" placeholder="Search or add new word" wire:model.live="search"
            style="margin-bottom: 15px; padding: 5px; width: 100%;" />

        @forelse ($words as $word)
            <a href="/word/{{ $word->id }}" style="text-decoration: none; color: inherit;">
                <div style="background-color: #CCCCCC; padding: 10px; margin: 10px; cursor: pointer;">
                    {{ $word['text'] }}
                </div>
            </a>
        @empty
            @csrf
            <button type="submit">Add new word</button>
        @endforelse
    </form>
    <div wire:loading>
        Loading...
    </div>
</div>
