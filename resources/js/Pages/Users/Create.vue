<template>
    <div class="flex justify-between items-center">
        <h3 class="text-gray-700 text-3xl font-medium">Create new user</h3>
        <Link :href="route('dashboard.users.index')" class="bg-blue-500 rounded px-2 py-1 text-sm text-white hover:bg-blue-600 ml-4 h-8 inline-flex items-center">Back to list</Link>
    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-md sm:rounded-lg bg-white p-16">
                                <form @submit.prevent="submit">
                                    <TextInput v-model="form.name" name="name" label="Name" required :error="form.errors.name" />
                                    <TextInput v-model="form.email" name="email" label="Email" type="email" required :error="form.errors.email" />
                                    <TextInput v-model="form.password" name="password" label="Password" type="password" required :error="form.errors.password" />
                                    <div class="flex justify-end">
                                        <button type="submit" class="bg-blue-500 rounded px-2 py-1 text-sm text-white hover:bg-blue-600 ml-4 h-8 inline-flex items-center">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'
import DashboardLayout from '@/Layout/Dashboard.vue'
import TextInput from '@/Shared/TextInput.vue'

export default {
    setup() {
        const form = useForm({
            name: null,
            email: null,
            password: null
        })

        function submit() {
            form.post('/dashboard/users')
        }

        return { form, submit }
    },
    components: {
        TextInput
    },
    layout: DashboardLayout
}
</script>
