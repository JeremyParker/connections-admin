<x-layouts.app>
    <h1>Edit category "{{ strtoupper($category->name) }}"</h1>
    <form action="{{ route('updateCategory', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="New Category" value="{{ $category->name }}">
        <textarea name="notes" rows="3" placeholder="Add any necessary explanation for other admins here."
            style="width: 100%;">{{ $category->notes }}</textarea>
        <button>Save</button>
    </form>
    <div>
        Words in this category:
        <hr>
        @forelse ($category->words as $word)
            <a href="{{ route('showEditWord', $word->id) }}" style="text-decoration: none;">
                <div style="background-color: #BBBBBB; padding: 5px; margin: 5px;">
                    {{ strtoupper($word['text']) }}
                </div>
            </a>
        @empty
            <div style="background-color: #DD4444; padding: 5px; margin: 5px;">
                [NO WORDS IN THIS CATEGORY YET]
            </div>
        @endforelse
    </div>
    </div>
    <div>
        <a href="{{ route('chooseWordForCategory', $category->id) }}"><button>Add another word</button></a>
    </div>
</x-layouts.app>
