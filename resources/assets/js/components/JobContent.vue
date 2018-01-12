<template>
    <div v-if="show">
        <p>{{ attributes.description }}</p>
        <div class="footer">
            <a :href="attributes['apply_url']" class="apply" target="_blank">Apply</a>
            <div class="share">
                <a :href="twitterUrl" class="twitter" target="_blank">
                    <img src="/images/twitter.svg" alt="Twitter">
                </a>
                <a :href="facebookUrl" class="facebook" target="_blank">
                    <img src="/images/facebook.svg" alt="Facebook">
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['attributes', 'show', 'twitterUrl', 'facebookUrl'],
    }
</script>
