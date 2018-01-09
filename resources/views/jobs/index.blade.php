@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="jobs">
            @foreach($jobs as $job)
                <job inline-template>
                    <li class="job">
                        <router-link to="/job/{{ $job->id }}">
                            <div class="wrapper">
                                <h3>
                                    {{ $job->title }}
                                </h3>
                            </div>
                            <div class="icon">
                                <img src="/images/arrow.svg" alt="Arrow Down">
                            </div>
                        </router-link>
                        <div class="wrapper">
                            <router-view :attributes="{{ $job }}"></router-view>
                        </div>
                    </li>
                </job>
            @endforeach
        </ul>
    </div>
@endsection
