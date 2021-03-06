@extends('layouts.app')

@section('header')
    @include('partials.meta')
@endsection

@section('content')
    <main class="content">
        <div class="container">
            <h1>{{ $headline }}</h1>
            @if (count($jobs))
            <ul class="jobs">
                @foreach($jobs as $job)
                    <li class="job card">
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
            @else
                <p>Unfortunately there are no jobs in this category at the moment</p>
            @endif
        </div>
    </main>
@endsection
