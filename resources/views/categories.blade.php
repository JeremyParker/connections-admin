<x-layout>
    <div style="border: 3px solid black;">
        <h2>add a category</h2>
        <form action="/categories" method="POST">
            @csrf
            <input type="text" name="name" placeholder="New Category">
            <textarea name="notes" rows="3" placeholder="Add any necessary explanation for other admins here."
                style="width: 100%;"></textarea>
            <button>Save</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>All categories</h2>
        <livewire:category-list />
    </div>
</x-layout>
