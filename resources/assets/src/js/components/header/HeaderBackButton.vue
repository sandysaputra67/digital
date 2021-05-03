<template>
    <a class="block relative pl-10" :href="url">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                />
            </svg>
        </span>

        <p class="px-1 inline-block align-middle py-2 font-bold text-lg">
            {{ title }}
        </p>
    </a>
</template>
<script>
export default {
    props: { url: String, title: String }
};
</script>
