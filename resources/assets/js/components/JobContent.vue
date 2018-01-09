<template>
    <div v-if="show">{{ description }}</div>
</template>

<script>
    export default {
        props: ['show', 'description'],
    }
</script>
