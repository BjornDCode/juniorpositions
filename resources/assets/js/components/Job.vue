<template>
    <li class="job">
        <router-link :to="url">
            <div class="wrapper">
                <h3>{{ attributes.title }}</h3>
            </div>
            <div :class="iconClass">
                <img src="/images/arrow.svg" alt="Arrow Down">
            </div>
        </router-link>
        <div class="meta wrapper">
            <div>
                {{ attributes.company.name }} - Location, COUTRY
            </div>
            <div v-if="attributes.skills.length">
                Skills: 
                <span v-for="skill in attributes.skills">{{skill.name}}, </span>
            </div>
        </div>
        <div class="content wrapper">
            <router-view :attributes="attributes" :show="isOpen" :twitter-url="twitterUrl" :facebook-url="facebookUrl"></router-view>
        </div>
    </li>
</template>

<script>
    export default {
        props: ['attributes', 'twitterUrl', 'facebookUrl', 'ownUrl'],

        computed: {
            isOpen() {
                return this.$route.params.id == this.attributes.id;
            },

            url() {
                if (this.isOpen) {
                    return '/';
                }

                return '/job/' + this.attributes.id;
            },

            iconClass() {
                if (this.isOpen) {
                    return 'icon icon-reverse'
                }

                return 'icon'
            }
        },
    }
</script>
