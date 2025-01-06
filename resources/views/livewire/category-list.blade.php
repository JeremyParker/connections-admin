<div>
    <form action="{{ route('categories.create') }}" method="POST">
        <input type="text" name="name" placeholder="Search or add new category" wire:model.live="search"
            style="margin-bottom: 15px; padding: 5px; width: 100%;" />

        @forelse ($categories as $category)
            <a href="#" wire:click.prevent="onSelected({{ $category->id }})"
                style="text-decoration: none; color: inherit;">
                <div style="background-color: #CCCCCC; padding: 10px; margin: 10px;">
                    <h3>{{ $category['name'] }}</h3>
                    <div style="font-size: smaller;">{{ $category['notes'] }}</div>
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
