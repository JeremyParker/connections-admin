<div>
    <form wire:submit.prevent="saveWord">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="text" placeholder="New Word" wire:model="text" value="{{ $text }}">
        </div>
        <div>
            <label for="isTopical">{{env('TOPICAL_WORDING', 'is on-topic')}}:</label>
            <input type="checkbox" id="isTopical" name="isTopical" wire:model="isTopical" value="{{ $isTopical }}">
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
        <span wire:loading>Saving...</span>
    </form>

    <form action="/word/{{ $word->id }}/category_word" method="POST">
        <button>Add to a category</button>
    </form>

    {{-- TODO: list of categories component --}}

</div>
