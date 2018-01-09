<template>
    <div v-if="isActive">{{ attributes.description }}</div>
</template>

<script>
    export default {
        props: ['attributes'],

        computed: {
            isActive() {
                return this.$route.params.id == this.attributes.id;
            }
        }
    }
</script>
