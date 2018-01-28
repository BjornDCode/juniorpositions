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
        <ul :class="{ open: sidebarOpen }">
            <li>
                <a href="/jobs" class="search-icon {{ Request::is('jobs') ? 'active' : '' }}">
                    <img src="/images/search.svg" alt="Search">
                    <span>Search</span>
                </a>
            </li>
            @foreach($categories as $category)
                <li @mouseleave="closeSubCategoriesDesktop">
                    <a href="/{{ $category->slug }}" 
                        class="{{ Request::is($category->slug) ? 'active' : '' }}" 
                        @touchstart="toggleSubCategoriesTouch" 
                        @mouseover="openSubCategoriesDesktop"  
                        data-category-id="{{ $category->id }}">
                        <img src="/images/{{ $category->slug }}.svg" alt="{{ $category->title }}">
                        <span>{{ $category->title }}</span>
                    </a>
                    @if (count($category->roles))
                        <ul class="sub-categories" :class="(openedCategory == {{$category->id}}) ? 'open' : '' ">
                            <li>
                                <a href="/{{ $category->slug }}">
                                    <img src="/images/all.svg" alt="{{ $category->title }}">
                                    <span>All</span>
                                </a>
                            </li>
                            @foreach ($category->roles as $role)
                            <li>
                                <a href="/{{ $category->slug }}/{{ $role->slug }}" class="{{ Request::is("{$category->slug}/{$role->slug}") ? 'active' : '' }}">
                                    <img src="/images/{{ $role->slug }}.svg" alt="{{ $role->name }}">
                                    <span>{{ $role->name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
            <li>                
                <a href="https://twitter.com/LindholmHansen" class="twitter">
                    <img src="/images/twitter.svg" alt="Twitter">
                </a>
            </li>
        </ul>
    </aside>
</nav-bar>
