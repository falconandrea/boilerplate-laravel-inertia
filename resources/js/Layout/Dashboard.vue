<template>
    <AppHead title="Welcome" description=""/>
    <div>
        <div class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = !sidebarOpen" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <strong class="text-white">LOGO</strong>
                    </div>
                </div>

                <nav class="mt-10">
                    <Link class="flex items-center mt-4 py-2 px-6 bg-opacity-25 text-gray-100" :href="route('dashboard.index')" :class="{ 'bg-gray-700': $page.url === ('/dashboard') }">
                        <span class="mx-3">Dashboard</span>
                    </Link>
                    <Link class="flex items-center mt-4 py-2 px-6 bg-opacity-25 text-gray-100" :href="route('dashboard.users.index')" :class="{ 'bg-gray-700': $page.url.startsWith('/dashboard/users') }">
                        <span class="mx-3">Users</span>
                    </Link>
                </nav>
            </div>
            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4">
                    <small class="hidden lg:block">Welcome, {{ user.name }}</small>

                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center">
                        <div class="relative">
                            <button @click="dropdownOpen = !dropdownOpen" class="relative block h-8 w-8 p-2  rounded-full overflow-hidden shadow focus:outline-none">
                                <svg class="svg-icon" viewBox="0 0 20 20">
							        <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
						        </svg>
                            </button>

                            <div v-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>

                            <div v-show="dropdownOpen"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
                                <Link href="/"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Return to frontend</Link>
                                <Link method="delete" as="button" href="/logout"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</Link>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container relative mx-auto px-6 py-8">
                        <FlashMessage />
                        <slot />
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
import { computed, ref } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import AppHead from '@/Shared/AppHead.vue'
import FlashMessage from '@/Shared/FlashMessage.vue'

export default {
    components: {
        AppHead, FlashMessage
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user)
        const sidebarOpen = ref(false)
        const dropdownOpen = ref(false)
        return { user, sidebarOpen, dropdownOpen }
    }
}
</script>
