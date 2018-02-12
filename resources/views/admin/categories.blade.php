<h2>Category</h2>
<form action="/category" method="post">
    {{ csrf_field() }}
    <div class="group">
        <input type="text" name="title" placeholder="Name">
    </div>
    <div class="group">
        <input type="text" name="slug" placeholder="Slug">
    </div>
    <button type="submit" class="button">Add</button>
</form>

<h2>Role</h2>
<form action="/category/role" method="post">
    {{ csrf_field() }}
    <div class="group">
        <input type="text" name="name" placeholder="Name">
    </div>
    <div class="group">
        <input type="text" name="slug" placeholder="Slug">
    </div>
    <div class="group">
        <select name="category_id">
            <option value="">...</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
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

<div class="categories">
    @foreach($categories as $category)
        <div class="category">
            <a href="/{{$category->slug}}">
                <h2>{{ $category->title }}</h2>
            </a>
            <div class="list">
                <ul>
                    @foreach ($category->roles as $role)
                        <li>
                            <a href="/{{$category->slug}}/{{$role->slug}}">
                                {{ $role->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
