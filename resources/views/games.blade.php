@extends('layout')

@section('title', "Игры")

@section('main_content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($games as $game)
            <a style="text-decoration: none; color: black" href={{ $game["slug"] }}>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ $game["image_path"] }}" alt="КартинОЧКА" class="card-img-top">
{{--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="{{ $game.image_path }}" role="img" aria-label="Placehloder: IMG" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">IMG</text></svg>--}}

                        <div class="card-body">
                            <p class="card-text">{{ $game["name"] }}</p>

                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
