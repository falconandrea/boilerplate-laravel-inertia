<template>
  <Head :title="title ? `${title} - My App` : 'My App'">
    <meta head-key="description" name="description" :content="description" />
  </Head>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Head,
  },
  props: {
    title: String,
    description: String
  },
}
</script>
