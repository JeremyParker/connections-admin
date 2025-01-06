<x-layouts.app>
    <h1>Edit Category</h1>
    <form action="{{ route('updateCategory', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="New Category" value="{{ $category->name }}">
        <textarea name="notes" rows="3" placeholder="Add any necessary explanation for other admins here."
            style="width: 100%;">{{ $category->notes }}</textarea>
        <button>Save</button>
    </form>
</x-layouts.app>
