<template>
    <div class="flex items-center justify-center">
        <div class="w-full max-w-md">
            <form class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4 mt-5" @submit.prevent="submit">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="name">Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" v-model="form.name" type="text" required autofocus placeholder="Name" autocomplete="off"/>
                    <AlertMessage v-if="errors.name" :message="errors.name" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="email">Email</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" v-model="form.email" type="email" required autofocus placeholder="Email" autocomplete="off"/>
                    <AlertMessage v-if="errors.email" :message="errors.email" />
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-normal mb-2" for="password">Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" v-model="form.password" type="password" placeholder="Password" name="password" required autocomplete="off"/>
                    <AlertMessage v-if="errors.password" :message="errors.password" />
                </div>
                <div class="flex items-center justify-between">
                    <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import AlertMessage from '@/Shared/AlertMessage.vue'
export default {
    props: {
        errors: Object,
    },
    components: {
        AlertMessage
    },
    setup () {
        const form = reactive({
            email: null,
            password: null,
            name: null
        })

        function submit () {
            Inertia.post('/register', form)
        }

        return { form, submit }
    }
}
</script>
