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
                        Company: {{ $job->company->name }}
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
