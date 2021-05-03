<style lang="scss" scoped>
.qty-input {
    background: var(--button-background);

    button {
        background: var(--button-background);
        color: var(--button-text);
    }
}
</style>
<template>
    <div v-if="menu" class="flex flex-col h-screen menu-detail-page">
        <header-component>
            <slot name="header"></slot>
        </header-component>

        <main class="flex-1 overflow-y-auto">
            <img v-if="menu.image" :src="menu.image" alt="Menu Image" />

            <div class="px-4 pb-4">
                <div class="grid grid-cols-12 py-2">
                    <div class="col-span-8 grid grid-cols-12 py-2">
                        <div class="col-span-3" v-if="this.menu.parent_id">
                            <div
                                class="rounded-full w-8 h-8 border-2 border-gray-500"
                            >
                                <p class="w-full r text-center text-gray-800">
                                    {{ this.menu.parent_id }}
                                </p>
                            </div>
                        </div>

                        <div class="col-span-9">
                            <span class="inline-block align-middle">
                                <p class="text-2xl text-gray-800">
                                    {{ this.menu.name }}
                                </p>
                            </span>
                        </div>
                    </div>

                    <div class="col-span-4 py-2 text-right">
                        <span class="inline-block align-middle">
                            <p class="text-2xl text-gray-800">
                                {{ this.menu.price }}
                            </p>
                        </span>
                    </div>
                </div>

                <p class="text-justify font-medium mb-2 text-gray-600">
                    {{ this.menu.description }}
                </p>
                <textarea
                    name="notes"
                    placeholder="Catatan"
                    class="w-full font-medium text-gray-800 rounded p-2 border-2 border-gray-400 focus:outline-none"
                    cols="30"
                    rows="4"
                    v-model="note"
                ></textarea>
            </div>
        </main>

        <footer>
            <div class="grid grid-cols-3 qty-input">
                <button class="text-4xl outline-none" v-on:click="minus">
                    -
                </button>
                <div class="p-2">
                    <input
                        type="tel"
                        name="number"
                        v-model="qty"
                        class="w-full h-full text-2xl font-bold text-center px-4 py-2 border-2 border-gray-600 focus:outline-none"
                    />
                </div>
                <button class="text-4xl outline-none" v-on:click="qty += 1">
                    +
                </button>
            </div>

            <div class="grid grid-cols-2">
                <button
                    @click="goBack()"
                    class="text-2xl outline-none font-medium p-4"
                >
                    BATAL
                </button>
                <button
                    class="text-2xl outline-none font-medium p-4"
                    v-on:click="addToCart"
                >
                    TAMBAH
                </button>
            </div>
        </footer>
    </div>
</template>
<script>
export default {
    props: {
        restaurant: Object,
        menu_id: null
    },

    data: function() {
        return {
            menu: Object,
            qty: 1,
            note: ""
        };
    },

    created: function() {
        this.getDetailMenu();
    },

    methods: {
        minus() {
            if (this.qty > 1) {
                this.qty -= 1;
            }
        },

        getDetailMenu() {
            const url = `/restaurants/${this.restaurant.id}/show-menu/${this.menu_id}`;

            axios.get(url).then(response => {
                this.menu = response.data.data;
            });
        },

        addToCart() {
            const data = {
                qty: this.qty,
                note: this.note,
                menu_id: this.menu_id
            };

            const url = `/restaurants/${this.restaurant.id}/cart/add-to-cart`;

            axios.post(url, data).then(response => {
                if (response.data.status == "OK") {
                    window.location.href = response.data.redirect;
                }
            });
        },

        goBack() {
            window.history.back();
        }
    }
};
</script>
