<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Posts') }}
        </h2>
    </x-slot>


    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      
          @if(session('success'))
            {{ session('success') }}
          @endif
      
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap justify-center gap-4" style="margin-top: 2rem;">
            @foreach ($posts as $post)
              <div class="flex flex-col items-center justify-center w-1/2">
                <a href="{{ route('posts.edit', $post) }}" class="mx-auto w-3/4 text-center text-black font-bold py-3 px-4 rounded-md " style="background-color: rgba(183, 227, 248, 0.993);">Modifier : "{{ $post->title }}"</a>
                <a href="#" class="mx-auto w-3/4 text-center text-black font-bold py-3 px-4 rounded-md " style="background-color: rgba(189, 26, 26, 0.993);" onclick="event.preventDefault; document.getElementById('destroy-post-form').submit();">Supprimer : "{{ $post->title }}"</a>
                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                  @csrf
                  @method('delete')
                  <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit(); ">
                    {{ __('Supprimer') }}
                  </x-dropdown-link>
              </form>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      
      
      
      
</x-app-layout>
