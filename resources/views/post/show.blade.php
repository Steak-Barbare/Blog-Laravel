<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ $post->title }}
        </h2>
    </x-slot>

<!-- component -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <section class="text-gray-600 body-font h-full">
        <div class="container px-5 py-5 mx-auto">
          <div class="flex flex-wrap -m-4 justify-center ">

<!--start here-->
    

<div class="p-4 md:w-3/4" >
    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
        <div class="w-full">
            <div class="w-full flex p-2">
                <div class="p-2 ">
                  <img 
                    src="https://firebasestorage.googleapis.com/v0/b/thecaffeinecode.appspot.com/o/Tcc_img%2Flogo.png?alt=media&token=5e5738c4-8ffd-44f9-b47a-57d07e0b7939" alt="author" 
                    class="w-10 h-10 rounded-full overflow-hidden"/>
                    
                </div>
                <div class="pl-2 pt-2 ">
                  <p class="font-bold">
                    {{ $post->user->name }} {{-- recupère le nom de l'utilisateur associé au post --}}
                  </p>
                  <p class="text-xs">
                    {{ $post->created_at->format('d M Y') }} {{-- recupère la date du post au format jour/mois/année --}}
                  </p>
                </div>
              </div>
        </div>
        
      
      <img class=" w-full object-contain object-center h-96" src="{{ asset('/storage/'. $post->image) }}" alt="blog cover"/> {{--récupère l'image du post --}}
      
      <div class="p-4 flex flex-col">
         {{--récupère le titre du post --}}
        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">

          {{$post->content}} {{-- recupère le contenu du post et limite à 50 caractères max --}}

          </h1>
        <div class="flex items-center flex-wrap">

            </p>
          </a>
          <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
            <svg class="w-4 h-4 mr-1"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  
              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
            </svg>
            69
          </span>
          <span class="text-gray-400 inline-flex items-center leading-none text-sm">
            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
              <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
            </svg>
            89
          </span>
        </div>
              <form action="{{ route('posts.index') }}" method="GET" class="">
        <button type="submit" class="font-semibold py-2 px-4 border">Précédent</button>
    </form>

    <form action="{{ route('comments.store', ['post' => $post->id]) }}" class="flex flex-col" method="POST">
      @csrf
      <label for="body" value="Contenu du Post" class="flex flex-col rounded-lg p-4">Commentaires:</label>
      <textarea id="body" name="body" class="rounded-lg p-4"></textarea>
      <button type="submit" class="font-semibold py-2 px-4 border rounded-lg p-4 m-4">Envoyer</button>
    </form>
    @foreach($comments as $comment)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $comment->user->name }}</h5>
            <p class="card-text">{{ $comment->body }}</p>
        </div>
    </div>
@endforeach
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
      </div>
    </div>

  </div>
 

 
<!--End here-->
          </div>
        </div>
      </section>

    
</body>
</html>

</x-app-layout>


