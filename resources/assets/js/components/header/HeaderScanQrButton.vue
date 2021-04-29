<style lang="scss" scoped>
a {
    color: var(--header-icon-color);
}
</style>
<template>
    <a :href="url" class="px-1 py-2 text-center">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-8 w-8 m-auto"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"
            />
        </svg>
    </a>
</template>
<script>
export default {
    props: { url: String }
};
</script>
