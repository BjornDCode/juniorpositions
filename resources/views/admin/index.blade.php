@extends('layouts.app')


@section('content')
    <main>
        <div class="admin">
            <h1>Admin</h1>
            <div class="stats card">
                <div class="stat">
                    {{ count($unlistedJobs) }}
                    <span>Unlisted Jobs</span>
                </div>
                <div class="stat">
                    {{ count($jobs) }}
                    <span>Active Jobs</span>
                </div>
            </div>
            <tabs class="card">
                <tab name="Unlisted Jobs">
                    List of Jobs
                </tab>
                <tab name="Skills">
                    @include('admin.skills')
                </tab>
                <tab name="Locations">
                    @include('admin.locations')
                </tab> 
                <tab name="Companies">
                    @include('admin.companies')
                </tab>
                <tab name="Categories">
                    @include('admin.categories')
                </tab>
            </tabs>
        </div>
    </main>
@endsection
