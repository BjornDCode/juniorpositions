@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="jobs">
            @foreach($jobs as $job)
                <job :attributes="{{$job}}"></job>
            @endforeach
        </ul>
    </div>
@endsection
