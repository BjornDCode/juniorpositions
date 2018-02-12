@extends('layouts.app')


@section('content')
    <main>
        <div class="admin">
            <h1>Admin</h1>
            <div class="stats card">
                <h2>Stats</h2>
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
            </tabs>
        </div>
    </main>
@endsection
