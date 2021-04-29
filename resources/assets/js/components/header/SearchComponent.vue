<style lang="scss" scoped>
.searchbar {
    color: var(--searchbar-text);
}

.searchbar-input {
    color: var(--searchbar-input-text);
}
</style>
<template>
    <div class="searchbar relative">
        <span
            class="search-icon absolute inset-y-0 left-0 flex items-center pl-2"
        >
            <button
                type="submit"
                class="p-1 focus:outline-none focus:shadow-outline"
            >
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
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
            </button>
        </span>

        <input
            type="text"
            name="q"
            class="py-2 pl-10 pr-2 w-full text-lg bg-white rounded focus:outline-none focus:bg-white searchbar-input"
            placeholder="Cari makanan"
            autocomplete="off"
        />
    </div>
</template>
