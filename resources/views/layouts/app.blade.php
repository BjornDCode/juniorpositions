<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('header')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
</head>
<body>

    <div id="app">
        @include('partials.navigation')
        <search-bar inline-template>
            <div class="search" :class="{ open: open }" @toggleSearch="toggle">
                <form action="">
                    <div class="flex justify-center flex-wrap">
                        <div class="group">
                            <label for="location">Location</label>
                            <input type="text" id="location" name="location" placeholder="City, Country">
                        </div>
                        <div class="group">
                            <label for="role">Role</label>
                            <input type="text" id="role" name="role" placeholder="Front End, Back End">
                        </div>
                        <div class="group">
                            <label for="company">Company</label>
                            <input type="text" id="company" name="company" placeholder="Google, Facebook">
                        </div>
                        <div class="group">
                            <label for="skill">Skills</label>
                            <input type="text" id="skill" name="skill" placeholder="Vue, React">
                        </div>
                    </div>
                    <button type="submit" class="button">Search</button>
                </form>
                <button class="button search-button hide-mobile" @click="toggle">
                    <img src="/images/search.svg" alt="Search">
                </button>
            </div>
        </search-bar>
        <main class="content">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
