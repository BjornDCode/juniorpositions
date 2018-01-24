@extends('layouts.app')

@section('header')
        <title>{{ config('app.name', 'Junior Positions') }}</title>
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Junior Positions | Find your first job" />
        <meta property="og:description" content="Easily find available junior positions in development, design, marketing, sales and other industries" />
        <meta property="og:image" content="http://via.placeholder.com/1200x630" />
@endsection

@section('content')
    <div class="container">
        @if (isset($category))
            <h1>Jobs in {{ ucfirst($category->title) }}</h1>
        @elseif (isset($company))
           <h1>Jobs at {{ $company->name }}</h1>
        @else 
            <h1>All Junior Positions</h1>
        @endif
        <ul class="jobs">
            @foreach($jobs as $job)
                <li class="job">
                    <a href="/job/{{ $job->id }}">
                        <h3>{{ $job->title }}</h3>
                    </a>
                    <div class="meta info">
                        <div>
                            <a href="/company/{{ $job->company->slug }}">{{ $job->company->name }}</a> 
                            - Minnosota, Country
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
