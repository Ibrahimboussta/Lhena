    @extends('layouts.index')

    @section('content')

        @include('home.components.herosection')
        @include('home.components.typesection')
        @include('home.components.cardsection')
        @include('home.components.pubsection')
        @include('home.components.aboutdection')
        @include('home.components.citysection')
    @endsection
