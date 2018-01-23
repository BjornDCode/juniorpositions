@extends('layouts.app')

@section('header')
        <title>{{ config('app.name', 'Junior Positions') }}</title>
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Junior Positions | Find your first job" />
        <meta property="og:description" content="Easily find available junior positions in development, design, marketing, sales and other industries" />
        <meta property="og:image" content="http://via.placeholder.com/1200x630" />
@endsection

@section('content')
    <div class="container">
        <ul class="jobs">
            @foreach($jobs as $job)
                <li class="job">
                    <a href="/job/{{ $job->id }}">
                        <h3>{{ $job->title }}</h3>
                    </a>
                    <div class="meta flex">
                        <div>
                            {{ $job->company->name }} - Minnosota, Country
                        </div>
                        <div>
                            @foreach($job->skills as $skill)
                                <span>{{ $skill->name }}</span>, 
                            @endforeach
                        </div>
                    </div>
                </li>
            @endforeach

            {{ $jobs->links() }}
        </ul>
    </div>
@endsection
