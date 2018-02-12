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
                    List of Skills
                </tab>
            </tabs>
{{--             <div class="content">
                Content
            </div> --}}
        </div>
    </main>
@endsection
