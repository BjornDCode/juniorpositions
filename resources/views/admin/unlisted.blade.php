@php 
    $job = $unlistedJobs[0];
@endphp

<form action="/jobs" method="post" class="unlisted">
    {{ csrf_field() }}

    <input type="hidden" name="unlistedJob" value="{{$job->id}}">

    {{-- Hidden field for unlistedJob id --}}
    <div class="group">
        <input type="text" name="title" placeholder="Title" value="{{ $job->title }}">
    </div>
    <div class="group">
        <textarea name="description" placeholder="Description">
            @php 
                echo strip_tags($job->description, '<br><p><ul><ol><dl><li><dd><dt><span><h1><h2><3><h4><h5><h6><a>');
            @endphp
        </textarea>
    </div>
    <div class="group">
        <input type="text" name="apply_url" placeholder="URL" value="{{ $job->url }}">
    </div>
    <div class="flex">
        <div class="group">
            <select name="company_id">
                <option value="">Company</option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="group">
            <select name="role_id">
                <option value="">Role</option>
                @foreach ($categories as $category)
                    @foreach($category->roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }} ({{ $category->title }}) 
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <div class="group">
            <select name="city_id">
                <option value="">City</option>
                @foreach($countries as $country)
                    @foreach($country->cities as $city)
                        <option value="{{ $city->id }}">
                            {{ $city->name }} - ({{ $country->name }})
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <div class="group">
            <select name="skills[]" multiple class="multiple">
                <option value="">Skills</option>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}">
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="button">Create</button>
</form>
<form action="/unlisted/{{ $job->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit" class="button">Delete</button>
</form>
@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="unlisted-job">
    <h2>{{ $job->title }}</h2>
    <div>
        <p>
            @php 
                echo strip_tags($job->description, '<br><hr><p><ul><ol><dl><li><dd><dt><span><h1><h2><3><h4><h5><h6>');
            @endphp
        </p>
    </div>
    <div class="attributes">
        <div>
            <span>URL:</span> <a href="{{ $job->url }}">{{ $job->url }}</a>
        </div>
        <div>
            <span>Location</span> {{ $job->location }}
        </div>
        <div>
            <span>Company:</span> {{ $job->company }}
        </div>
    </div>

</div>

