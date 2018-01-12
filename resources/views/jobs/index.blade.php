@extends('layouts.app')

@section('header')
        <title>{{ config('app.name', 'Junior Positions') }}</title>
        <meta property="og:url" content="{{ url('/') }}" class="og-url" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Junior Positions | Find your job" />
        <meta property="og:description" content="Easily find available junior positions in development, design, marketing, sales and other industries" />
        <meta property="og:image" content="http://via.placeholder.com/1200x630" />
@endsection

@section('content')
    <div class="container">
        <ul class="jobs">
            @foreach($jobs as $date => $month)
                <h2>
                    {{$date}} 
                </h2>
                @foreach($month as $job)
                    <job :attributes="{{$job}}" twitter-url="{{$job->twitterUrl()}}" facebook-url="{{$job->facebookUrl()}}" own-url="{{$job->ownUrl()}}"></job>
                @endforeach
            @endforeach
        </ul>
    </div>
@endsection
