<search-bar inline-template>
    <div class="search" :class="{ open: open }" @toggleSearch="toggle">
        <form action="/search">
            <div class="flex justify-center flex-wrap">
                <div class="group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="City, Country" value="{{ old('location') }}">
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
