<template>
    <div class="text-red-700 mt-1 text-sm">
        {{ message }}
    </div>
</template>

<script>
export default {
    props: {
        message: String
    }
}
</script>
