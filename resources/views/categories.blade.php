<x-layout>
    <div style="border: 3px solid black;">
        <h2>add a category</h2>
        <form action="/categories" method="POST">
            @csrf
            <input type="text" name="name" placeholder="New Category">
            <textarea name="notes" rows="3" placeholder="Add any necessary explanation for other admins here." style="width: 100%;"></textarea>
            <button>Save</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>All categories</h2>
        @foreach ($categories as $category)
            <a href="/category/{{$category->id}}" style="text-decoration: none; color: inherit;">
                <div style="background-color: #CCCCCC; padding: 10px; margin: 10px;">
                    <h3>{{$category['name']}}</h3>
                        <div style="font-size: smaller;">{{$category['notes']}}</div>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
