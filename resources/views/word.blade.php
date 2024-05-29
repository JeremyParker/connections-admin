<x-layout>
  <h1>Edit Word</h1>
  <form action="/word/{{$word->id}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="text" placeholder="New Word" value="{{$word->text}}">
    <label for="isTopical">Is Topical:</label>
    <input type="checkbox" id="isTopical" name="isTopical" {{ $word->isTopical ? "checked" : "" }}>
    <button>Save</button>
  </form>

  <form action="/word/{{$word->id}}/category_word" method="POST">
     <livewire:categories-combobox name="category" label="Add A Category" placeholder="Type a category">
    <button>Add a category</button>
  </form>
  @livewireScripts
</x-layout>
