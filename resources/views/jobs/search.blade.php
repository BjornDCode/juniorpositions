@extends('layouts.app')

@section('header')
    @include('partials.meta')
@endsection

@section('content')
    <ais-index
    app-id="MR4XR4CQPC"
    api-key="592376609dd6027eccc750fa5da030ee"
    index-name="jobs"
    >


        @include('partials.search')
        <main class="content pushed">
            <div class="container">
                <h1>Search</h1>
                <ul class="jobs">
                    <ais-results>
                        <template slot-scope="{ result }">
                            <li class="job card">
                                <a :href="'/jobs/' + result.id">
                                    <h3 v-text="result.title"></h3>
                                </a>
                                <div class="meta info">
                                    <div>
                                        <a :href="'/company/' + result.company.slug" v-text="result.company.name"></a> 
                                        - 
                                        <a 
                                            :href="'/location/' + result.city.country.slug + '/' +  result.city.slug"
                                            v-text="result.city.name">
                                        </a>,
                                        <a 
                                            :href="'/location/' + result.city.country.slug"
                                            v-text="result.city.country.name">
                                        </a>
                                    </div>
                                    <div>
                                            <a v-for="skill in result.skills"
                                                :href="'/skill/' + skill.slug" 
                                                v-text="skill.name + ', '">
                                            </a> 
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ais-results>
                </ul>
                {{-- <ul class="jobs">
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
                </ul> --}}
            </div>
        </main>
    </ais-index>
@endsection
