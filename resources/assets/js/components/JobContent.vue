<template>
    <div v-if="show" class="content">
        <p>{{ description }}</p>
    </div>
</template>

<script>
    export default {
        props: ['show', 'description'],
    }
</script>
