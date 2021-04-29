<template>
    <a :href="menu.url">
        <img
            src="http://via.placeholder.com/640x360"
            class="rounded-t"
            alt="Menu Image"
        />

        <div class="bg-white p-2 rounded-b w-full">
            <div class="grid p-2 grid-cols-12 border-b border-gray-400">
                <div class="col-span-2">
                    <div class="rounded-full w-8 h-8 border-2 border-gray-400">
                        <p class="w-full text-center text-gray-500">1</p>
                    </div>
                </div>

                <div class="col-span-6">
                    <span class="inline-block align-middle">
                        <p class="text-gray-500">Menu 1</p>
                    </span>
                </div>

                <div class="col-span-4">
                    <span class="inline-block align-middle">
                        <p class="text-gray-500">20k</p>
                    </span>
                </div>
            </div>

            <div class="grid p-2 grid-cols-12 border-b border-gray-400">
                <div class="col-span-2">
                    <div class="rounded-full w-8 h-8 border-2 border-gray-400">
                        <p class="w-full text-center text-gray-500">1</p>
                    </div>
                </div>

                <div class="col-span-6">
                    <span class="inline-block align-middle">
                        <p class="text-gray-500">Menu 1</p>
                    </span>
                </div>

                <div class="col-span-4">
                    <span class="inline-block align-middle">
                        <p class="text-gray-500">20k</p>
                    </span>
                </div>
            </div>
        </div>
    </a>
</template>
<script>
export default {
    props: ['menu'],

    mounted() {
        console.log(this.menu);
    }
};
</script>
