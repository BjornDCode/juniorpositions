@extends('layouts.app')

@section('header')
        <title>{{ config('app.name', 'Junior Positions') }}</title>
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{ $job->title }} at {{ $job->company->name }} | Junior Positions" />
        <meta property="og:description" content="{{ $job->description }}" />
        <meta property="og:image" content="http://via.placeholder.com/1200x630" />
@endsection

@section('content')
    <div class="container">
        <div class="job single-job">
            <h3>{{ $job->title }}</h3>
            <div>
                <p>{{ $job->description }}</p>
            </div>
            <div class="footer">
                <div class="meta info">
                    <div>
                        Skills:
                        @foreach($job->skills as $skill)
                            <span>{{ $skill->name }}</span>,
                        @endforeach
                    </div>
                    <div>
                        Company: 
                        <a href="/company/{{ $job->company->slug }}">{{ $job->company->name }}</a>
                    </div>
                    <div>
                        Location: Minnosota, Country
                    </div>
                </div>
                <div class="cta">
                    <a href="{{ $job->apply_url }}" class="apply" target="_blank">Apply</a>
                    <a href="{{ $job->twitterUrl() }}" class="social twitter" target="_blank">
                        <img src="/images/twitter.svg" alt="Twitter">
                    </a>
                    <a href="{{ $job->facebookUrl() }}" class="social facebook" target="_blank">
                        <img src="/images/facebook.svg" alt="Facebook">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
