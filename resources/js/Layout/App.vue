<template>
    <main>
        <header class="bg-blue-500 p-2">
            <Link class="text-white underline mr-2" href="/">Home</Link>
            <Link v-if="!user" class="text-white underline mr-2" href="/login">Login</Link>
            <Link v-if="user" method="delete" as="button" class="text-white underline mr-2" href="/logout">Logout</Link>
        </header>
        <div class="content">
            <slot />
        </div>
        <footer class="bg-blue-600 mt-4 p-2 text-white">
            &copy; MyApp
        </footer>
    </main>
</template>

<script>
import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

export default {
  setup() {
    const user = computed(() => usePage().props.value.auth.user)
    return { user }
  },
}
</script>
