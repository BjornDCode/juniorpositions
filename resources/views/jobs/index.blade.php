@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="jobs">
            @foreach($jobs as $job)
                <li class="job">
                    {{ $job->title }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
