<h2>Country</h2>
<form action="/location/country" method="post">
    {{ csrf_field() }}
    <div class="group">
        <input type="text" name="name" placeholder="Name">
    </div>
    <div class="group">
        <input type="text" name="slug" placeholder="Slug">
    </div>
    <button type="submit" class="button">Add</button>
</form>

<h2>City</h2>
<form action="/location/country/city" method="post">
    {{ csrf_field() }}
    <div class="group">
        <input type="text" name="name" placeholder="Name">
    </div>
    <div class="group">
        <input type="text" name="slug" placeholder="Slug">
    </div>
    <div class="group">
        <select name="country_id">
            <option value="">...</option>
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
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

<div class="countries">
    @foreach($countries as $country)
        <div class="country">
            <a href="/location/{{$country->slug}}">
                <h2>{{ $country->name }}</h2>
            </a>
            <div class="list">
                <ul>
                    @foreach ($country->cities as $city)
                        <li>
                            <a href="/location/{{$country->slug}}/{{$city->slug}}">
                                {{ $city->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>

