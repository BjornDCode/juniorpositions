@extends('layouts.app')

@section('header')
    @include('partials.meta')
@endsection

@section('content')
    @include('partials.search')
    <main class="content pushed">
        <div class="container">
            <h1>Search</h1>
            <ul class="jobs">
                @foreach($jobs as $job)
                    <li class="job">
                        <a href="/jobs/{{ $job->id }}">
                            <h3>{{ $job->title }}</h3>
                        </a>
                        <div class="meta info">
                            <div>
                                <a href="/company/{{ $job->company->slug }}">{{ $job->company->name }}</a> 
                                - 
                                <a href="/location/{{ $job->city->country->slug }}/{{ $job->city->slug }}">
                                    {{ $job->city->name }}
                                </a>,
                                <a href="/location/{{ $job->city->country->slug }}">
                                    {{ $job->city->country->name }}
                                </a>
                            </div>
                            <div>
                                @foreach($job->skills as $skill)
                                    <a href="/skill/{{ $skill->slug }}">{{ $skill->name }}</a>, 
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endforeach

                {{ $jobs->links() }}
            </ul>
        </div>
    </main>
@endsection
