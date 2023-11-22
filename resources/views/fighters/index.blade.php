@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-10 mb-6">
        <h1 class="text-3xl text-blue-600">Films</h1>
        <a href="/fighters/create"
            class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-400 duration-500 text-white rounded-full shadow-sm">Créer un
            film</a>
    </div>

    <div class="flex flex-wrap -mx-3">
        @foreach ($weightclasses as $weightclass)
            <div class=" w-1/2 md:w-1/3  lg:w-1/5 ">
                <div class="flex flex-col justify-between h-full">
                    <a href="/film/{{ $movie->id }}" class="mx-3 block group">
                        <img class="w-full h-[250px] mb-3 object-cover hover:scale-150" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
                        <h3 class="text-sm text-blue-500 underline group-hover:no-underline"> {{ $movie->title }}</h3>
    
                        <p>
                            @if ($movie->released_at)
                                {{ $movie->released_at->diffForHumans() }} |
                                {{ $movie->released_at->translatedFormat('d F Y') }} |
                            @endif
                            @if ($movie->category_id)
                                {{ $movie->category->name }} |
                            @endif
                            {{ $movie->duration() }}
                        </p>
                    </a>
                     {{--On affiche modifier/suppriùer si on est connecté et qu'on a le film --}}
                     @if (Auth::user() && Auth::user()->id == $movie->user_id)
                         
                    
                    <div class="mx-3 mb-3 gap-2 mt-3  flex justify-around">
                        <div>
                            <a class="text-md text-white bg-blue-500 px-2 py-1 rounded-lg hover:bg-gradient-to-r from-blue-600 from-10% via-blue-700 via-30% to-purple-600 to-90% "
                                href="/film/{{ $movie->id }}/modifier">Modifier</a>
                        </div>
                        <div>
                            <a class="text-md text-white bg-red-500 px-2 py-1 rounded-lg hover:bg-gradient-to-r from-red-600 from-20% via-orange-500 via-50% to-yellow-500 to-90%"
                                href="/film/{{ $movie->id }}/supprimer"
                                onclick='return confirm("Êtes-vous sûr de vouloir supprimer le film {{ $movie->title }} ?")'>Supprimer</a>
    
                        </div>
                    </div>
                    @endif
                </div>
                </div>
        @endforeach
    </div>
@endsection