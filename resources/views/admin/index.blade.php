@extends('layouts.app')

@section('header')
    <title>Admin</title>
@endsection

@section('content')
    <main>
        <div class="admin">
            <div class="flex space-between">
                <h1>Admin</h1>
                <div class="flex">
                <a href="/admin/clear-cache" class="button">Clear Cache</a>
                </div>
            </div>
            <div class="stats card">
                <div class="stat">
                    {{ count($unlistedJobs) }}
                    <span>Unlisted Jobs</span>
                </div>
                <div class="stat">
                    {{ count($jobs) }}
                    <span>Active Jobs</span>
                </div>
                <div class="stat">
                    {{ count($skills) }}
                    <span>Skills</span>
                </div>
                <div class="stat">
                    {{ count($countries) }}
                    <span>Countries</span>
                </div>
                <div class="stat">
                    {{ count($cities) }}
                    <span>Cities</span>
                </div>
                <div class="stat">
                    {{ count($companies) }}
                    <span>Companies</span>
                </div>
            </div>
            <tabs class="card">
                <tab name="Unlisted Jobs">
                    @include('admin.unlisted')
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
