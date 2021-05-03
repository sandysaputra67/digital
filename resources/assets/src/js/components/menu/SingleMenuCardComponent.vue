<style lang="scss" scoped>
.card-body {
    background: var(--menu-card-background, #fff);
}

.menu-card-border {
    border-color: var(--menu-card-border);
}

.card-body {
    p {
        color: #6b7280;
    }
}

.no-image .card-body {
    border-radius: 0.375rem;
    padding: 1rem;
}
</style>
<template>
    <a
        :href="menu.url"
        class="p-2 block"
        v-bind:class="{ 'no-image': !menu.image }"
    >
        <img v-if="menu.image" :src="menu.image" class="rounded-t" />

        <div class="card-body p-2 rounded-b-md w-full">
            <div class="grid grid-cols-12">
                <div class="col-span-6">
                    <p class="text-xl font-medium">{{ menu.name }}</p>
                </div>

                <div class="col-span-6 text-right">
                    <p class="text-lg font-medium">{{ menu.price }}</p>
                </div>
            </div>
        </div>
    </a>
</template>
<script>
export default {
    props: ["menu"],

    mounted() {
        console.log(this.menu);
    }
};
</script>
