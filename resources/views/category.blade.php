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
        <hr>
        <table>
            <tr>
                <td>Words in this category</td>
                <td>Usage example</td>
            </tr>
            @forelse ($category->words as $word)
                <tr>
                    <td>
                        <a href="{{ route('word.edit', $word->id) }}" style="text-decoration: none;">
                            <div style="background-color: #BBBBBB; padding: 5px; margin: 5px;">
                                {{ strtoupper($word['text']) }}
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('category_word.edit', ['category' => $category->id, 'word' => $word->id]) }}"
                            style="text-decoration: none;">
                            <div style="background-color: #BBBBBB; padding: 5px; margin: 5px;">
                                @if ($word->pivot->example_sentence)
                                    {{ $word->pivot->example_sentence }}
                                @else
                                    (No usage example)
                                @endif
                            </div>
                        </a>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan=2>
                        <div style="background-color: #DD4444; padding: 5px; margin: 5px;">
                            [NO WORDS IN THIS CATEGORY YET]
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
    </div>
    <div>
        <a href="{{ route('chooseWordForCategory', $category->id) }}"><button>Add another word</button></a>
    </div>
</x-layouts.app>
