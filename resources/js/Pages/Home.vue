<template>
    <AppHead :title="seo.title" :description="seo.description"/>
    <h1 class="text-3xl font-bold underline">Homepage</h1>
</template>

<script>
import AppHead from '@/Shared/AppHead.vue'

export default {
    components: {
        AppHead
    },
    props: {
        seo: Object
    }
}
</script>
