<template>
    <h3 class="text-gray-700 text-3xl font-medium">Users</h3>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Name
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Email
                                            </th>
                                            <th scope="col" class="relative py-3 px-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="user in users.data" :key="user.id" class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ user.name }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                {{ user.email }}
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <Link :href="route('dashboard.users.show', user.id)" class="text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</Link>

                                                <Link v-if="user.can_delete" :href="route('dashboard.users.destroy', user.id)"  method="delete" as="button" class="text-blue-600 dark:text-blue-500 hover:underline">Delete</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div v-if="users.links.length > 3">
                                    <div class="flex flex-wrap">
                                        <template v-for="(link, key) in users.links">
                                            <div v-if="link.url === null" :key="key" class="mb-1 mr-1 px-4 py-3 text-gray-400 text-sm leading-4" v-html="link.label" />
                                            <Link v-else :key="`link-${key}`" class="mb-1 mr-1 px-4 py-3 text-sm leading-4 hover:underline" :class="{ 'underline': link.active }" :href="link.url" v-html="link.label" />
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DashboardLayout from '@/Layout/Dashboard.vue'

export default {
    props: {
        users: Array
    },
    layout: DashboardLayout
}
</script>
