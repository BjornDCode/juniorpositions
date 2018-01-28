<search-bar inline-template>
    <div class="search" :class="{ open: open }" @toggleSearch="toggle">
        <ais-search-box></ais-search-box>
        <button class="button search-button hide-mobile" @click="toggle">
            <img src="/images/search.svg" alt="Search">
        </button>
    </div>
</search-bar>
