<form action="/skill" method="post">
    {{ csrf_field() }}
    <div class="group">
        <input type="text" name="name" placeholder="Name">
    </div>
    <div class="group">
        <input type="text" name="slug" placeholder="Slug">
    </div>
    <button type="submit" class="button">Add</button>
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
<div class="list">
    <ul>
        @foreach ($skills as $skill)
            <li>
                <a href="/skill/{{$skill->slug}}">
                    {{ $skill->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
