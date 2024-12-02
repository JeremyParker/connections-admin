<div>
    <input type="text" placeholder="Search categories..." wire:model.live="search"
        style="margin-bottom: 15px; padding: 5px; width: 100%;" />
    @foreach ($categories as $category)
        <a href="/category/{{ $category->id }}" style="text-decoration: none; color: inherit;">
            <div style="background-color: #CCCCCC; padding: 10px; margin: 10px;">
                <h3>{{ $category['name'] }}</h3>
                <div style="font-size: smaller;">{{ $category['notes'] }}</div>
            </div>
        </a>
    @endforeach
    <div wire:loading>
        Loading...
    </div>
</div>
