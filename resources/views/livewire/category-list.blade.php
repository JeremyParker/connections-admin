<div>
    <form action="{{ route('categories.create') }}" method="POST">
        <input type="text" name="name" placeholder="Search or add new category" wire:model.live="search"
            style="margin-bottom: 15px; padding: 5px; width: 100%;" />

        @forelse ($categories as $category)
            <a href="#" wire:click.prevent="onSelected({{ $category->id }})"
                style="text-decoration: none; color: inherit;">
                <div style="background-color: #CCCCCC; padding: 10px; margin: 10px;">
                    <h4>{{ strtoupper($category['name']) }}</h4>
                    @if (!empty($category['notes']))
                        <div style="font-size: smaller;">({{ $category['notes'] }})</div>
                    @endif
                    <hr>
                    <div>
                        @forelse ($category->words as $word)
                            <span style="background-color: #FFFFFF; padding: 5px; margin: 5px;">
                                {{ strtoupper($word['text']) }}
                            </span>
                        @empty
                            <span style="background-color: #DD4444; padding: 5px; margin: 5px;">
                                [NO WORDS IN THIS CATEGORY YET]
                            </span>
                        @endforelse
                    </div>
                </div>
            </a>
        @empty
            @csrf
            <textarea name="notes" rows="3" placeholder="Add any necessary explanation for other admins here."
                style="width: 100%;"></textarea>
            <button type="submit">Add new category</button>
        @endforelse
    </form>
    <div wire:loading>
        Loading...
    </div>
</div>
