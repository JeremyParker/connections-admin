<div>
<form wire:submit.prevent="saveWord">
    @csrf
    @method('PUT')
    <input type="text" name="text" placeholder="New Word" wire:model="text" value="{{ $text }}">
    <label for="isTopical">Is Topical:</label>
    <input type="checkbox" id="isTopical" name="isTopical" wire:model="isTopical" value="{{ $isTopical }}">
    <button type="submit">Save</button>
</form>

{{-- <form action="/word/{{$word->id}}/category_word" method="POST">
    <livewire:categories-combobox name="category" label="Add A Category" placeholder="Start typing" model="categories">
    <button>Add a category</button>
</form> --}}
</div>
