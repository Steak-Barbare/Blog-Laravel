<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('"Take nothing but pictures, leave nothing but footprints"') }}
         
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
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto">
          <div class="flex flex-wrap -m-4">

<!--start here-->
@foreach ($posts as $post)
    

<div class="p-4 md:w-1/3" >
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
        
      
      <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('/storage/'. $post->image) }}" alt="blog cover"/> {{--récupère l'image du post --}}
      
      <div class="p-4">
        <h2 class="tracking-widest text-xs title-font font-bold text-green-400 mb-1 uppercase "> {{ $post->title }} </h2>  {{--récupère le titre du post --}}
        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">

          {{Str::limit ($post->content, 50) }} {{-- recupère le contenu du post et limite à 50 caractères max --}}

          </h1>
        <div class="flex items-center flex-wrap">
          <a href="{{route('posts.show', $post)}}" class="text-green-800  md:mb-2 lg:mb-0">
            <p class="inline-flex items-center">Afficher la suite
              <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
              </svg>
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
        
        
      </div>
    </div>
  </div>

  @endforeach
<!--End here-->
          </div>
        </div>
      </section>
      <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:p-6 dark:bg-gray-800 justify-center" style=" bottom: 0; width: 100%">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="hover:underline">David Corporation™</a>. All Rights Reserved.
        </span>
    </footer>
</body>
</html>

</x-app-layout>