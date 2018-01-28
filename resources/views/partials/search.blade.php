<search-bar inline-template>
    <div class="search" :class="{ open: open }" @toggleSearch="toggle">
        <div class="search-box">
            <ais-input 
                placeholder="Title, Category, Skills, Company, City, Country" 
                autofocus
                >
            </ais-input>
        </div>
        <div class="facets">
            <ais-refinement-list attribute-name="role.category.title" :limit="3">
                <template slot="header">
                    <h4>Category</h4>
                </template>
            </ais-refinement-list>
            <ais-refinement-list attribute-name="role.name" :limit="3">
                <template slot="header">
                    <h4>Role</h4>
                </template>
            </ais-refinement-list>
            <ais-refinement-list attribute-name="skills.name" :limit="3">
                <template slot="header">
                    <h4>Skill</h4>
                </template>
            </ais-refinement-list>
            <ais-refinement-list attribute-name="company.name" :limit="3">
                <template slot="header">
                    <h4>Company</h4>
                </template>
            </ais-refinement-list>
            <ais-refinement-list attribute-name="city.country.name" :limit="3">
                <template slot="header">
                    <h4>Country</h4>
                </template>
            </ais-refinement-list>
            <ais-refinement-list attribute-name="city.name" :limit="3">
                <template slot="header">
                    <h4>City</h4>
                </template>
            </ais-refinement-list>
        </div>
        {{-- <button class="button search-button hide-mobile" @click="toggle">
            <img src="/images/search.svg" alt="Search">
        </button> --}}
    </div>
</search-bar>
