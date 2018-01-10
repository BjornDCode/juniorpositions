@extends('layouts.app')

@section('header')
        <title>{{ config('app.name', 'Junior Positions') }}</title>
@endsection

@section('content')
    <div class="container">
        <ul class="jobs">
            @foreach($jobs as $job)
                <job :attributes="{{$job}}" twitter-url="{{$job->twitterUrl()}}" facebook-url="{{$job->facebookUrl()}}"></job>
            @endforeach
        </ul>
    </div>
@endsection
