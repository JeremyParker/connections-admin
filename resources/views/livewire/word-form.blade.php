<div>
    <form wire:submit.prevent="saveWord">
        @csrf
        @method('PUT')
        <input type="text" name="text" placeholder="New Word" wire:model="text" value="{{ $text }}">
        <label for="isTopical">Is Topical:</label>
        <input type="checkbox" id="isTopical" name="isTopical" wire:model="isTopical" value="{{ $isTopical }}">
        <button type="submit">Save</button>
        <span wire:loading>Saving...</span>
    </form>

    <form action="/word/{{ $word->id }}/category_word" method="POST">
        <button>Add to a category</button>
    </form>

    {{-- TODO: list of categories component --}}

</div>
