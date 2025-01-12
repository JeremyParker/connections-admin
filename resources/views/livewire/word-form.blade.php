<div>
    <form wire:submit.prevent="saveWord">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="text" placeholder="New Word" wire:model="text" value="{{ $text }}">
        </div>
        <div>
            <label for="isTopical">{{ env('TOPICAL_WORDING', 'is on-topic') }}:</label>
            <input type="checkbox" id="isTopical" name="isTopical" wire:model="isTopical" value="{{ $isTopical }}">
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
        <span wire:loading>Saving...</span>
    </form>

    <div>
        Categories this word is in:
        <hr>
        @forelse ($word->categories as $category)
            <a href="{{ route('showEditCategory', $category->id) }}" style="text-decoration: none;">
                {{-- TODO: background color based on difficulty --}}
                <div style="background-color: #BBBBBB; padding: 5px; margin: 5px;">
                    {{ strtoupper($category['name']) }}
                </div>
            </a>
        @empty
            <div style="background-color: #cfa26b; padding: 5px; margin: 5px;">
                [THIS WORD IS IN NO CATEGORIES]
            </div>
        @endforelse
    </div>

    <a href={{ route('showAddToCategory', $word->id) }}><button>Add to another category</button></a>
</div>
