<template>
    <div class="w-full mb-8" :class="{ required : required }">
        <label v-if="label" class="block text-gray-700 font-medium mb-2" :class="{ 'after:content-[\'*\'] after:ml-0.5 after:text-red-500' : required}" :for="id">{{ label }}</label>
        <input class="appearance-none block w-full text-gray-700 border-2 border-gray-200 rounded py-3 px-4 outline-none bg-white" :id="id" :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" required :placeholder="label">
        <AlertMessage v-if="error" :message="error" />
    </div>
</template>

<script>
import AlertMessage from '@/Shared/AlertMessage.vue'
export default {
    props: {
        label: String,
        name: String,
        id: {
            type: String,
            default: (props) => `${props.name}-input`,
        },
        type: {
            type: String,
            default: 'text'
        },
        error: String,
        required: {
            type: Boolean,
            default: false
        },
        modelValue: String
    },
    components: {
        AlertMessage
    },
    emits: ['update:modelValue'],
}
</script>
