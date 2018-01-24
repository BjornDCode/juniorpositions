<nav-bar inline-template>
    <aside class="nav-bar" :class="{ visible: visible }">
        <a href="/" class="logo">Logo</a>
        <button 
            class="hamburger hamburger--spring hide-desktop" 
            :class="{'is-active': sidebarOpen}"
            type="button" 
            @click.prevent="toggleSidebar">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <nav :class="{ open: sidebarOpen }">
            @foreach($categories as $category)
                <a href="/{{ $category->title }}" class="{{ Request::is($category->title) ? 'active' : '' }}">
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
