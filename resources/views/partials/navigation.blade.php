<nav-bar inline-template>
    <aside class="nav-bar">
        <a href="/" class="logo">Logo</a>
        <div class="flex align-center hide-desktop">
            <button class="search-button" @click="toggleSearch">
                <img src="/images/search.svg" alt="Search">
            </button>
            <button 
                class="hamburger hamburger--spring" 
                :class="{'is-active': sidebarOpen}"
                type="button" 
                @click.prevent="toggleSidebar">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <nav :class="{ open: sidebarOpen }">
            @foreach($categories as $category)
                <a href="/{{ $category->slug }}" class="{{ Request::is($category->slug) ? 'active' : '' }}">
                    <img src="/images/{{ $category->title }}.svg" alt="{{ $category->title }}">
                    <span>{{ $category->title }}</span>
                </a>
            @endforeach
            <a href="https://twitter.com/LindholmHansen" class="twitter">
                <img src="/images/twitter.svg" alt="Twitter">
            </a>
        </nav>
    </aside>
</nav-bar>
