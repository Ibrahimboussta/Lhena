    @extends('layouts.index')

    @section('content')

        @include('home.components.herosection')
        @include('home.components.typesection')
        @include('home.components.cardsection')
        @include('home.components.pubsection')
        @include('home.components.aboutdection')
        @include('home.components.citysection')
        @include('home.components.reviewsection')
        @include('home.components.blogsection')
        @include('home.components.connectsection')

    @endsection
