<template>
    <main>
        <header class="bg-gray-400 p-2">
            <Link class="text-white underline" href="/">Home</Link>
        </header>
        <div class="content">
            <slot />
        </div>
        <footer class="bg-gray-400 mt-4 p-2">
            &copy; MyApp
        </footer>
    </main>
</template>
