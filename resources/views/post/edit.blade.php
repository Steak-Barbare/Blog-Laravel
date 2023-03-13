<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier {{ $post->title }}
        </h2>
    </x-slot>


    <div class="p-4 md:w-1/3 flex justify-center">

        <div class="my-5">
            @foreach ($errors->all() as $error)
            <span class=>{{$error}}</span> {{-- Affiche un message d'erreur si les champs requis du formulaire ne sont pas remplis --}}
            @endforeach
        </div>

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" class="flex flex-col rounded-lg p-4" style="background-color: rgba(0, 0, 0, 0.075); border: 2px solid rgba(0, 0, 0, 0.048);"> 
            @method('put')
            @csrf

            <label for="title" value="Titre du Post" class="p-4"></label>
            <input id="title" name="title" class="rounded-lg" value="{{ $post->title }}">

            <label for="content" value="Contenu du Post" class="p-4"></label>
            <textarea id="content" name="content" class="rounded-lg" value="{{ $post->content }}"></textarea>

            <label for="image" value="Image du Post" class="p-4">Image du Post</label>
            <input id="image" type="file" name="image" class="p-4">
            
            <button type="submit" class="font-semibold py-2 px-4 border bg-white rounded-lg">Modifier le Post</button>
        </form>

    </div>

</body>
</html>

</x-app-layout>