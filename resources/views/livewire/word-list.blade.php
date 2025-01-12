<div>
    <form action="{{ route('words.create') }}" method="POST">
        <input type="text" name="text" placeholder="Search or add new word" wire:model.live="search"
            style="margin-bottom: 15px; padding: 5px; width: 100%;" />

        @forelse ($words as $word)
            <a href="#" wire:click.prevent="onSelected({{ $word->id }})"
                style="text-decoration: none; color: inherit;">
                <div style="background-color: #CCCCCC; padding: 10px; margin: 10px; cursor: pointer;">
                    {{ $word['text'] }}
                </div>
            </a>
        @empty
            @csrf
            <div>
                <label for="isTopical">{{ env('TOPICAL_WORDING', 'is on-topic') }}:</label>
                <input type="checkbox" id="isTopical" name="isTopical" wire:model="isTopical"
                    value="{{ $isTopical }}">
            </div>
            <div>
                <button type="submit">Add new word</button>
            </div>
        @endforelse
    </form>
    <div wire:loading>
        Loading...
    </div>
</div>
