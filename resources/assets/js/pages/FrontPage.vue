<style lang="scss" scoped>
.start-button {
    --tw-gradient-from: rgba(0, 0, 0, 0.6);
    --tw-gradient-stops: var(--tw-gradient-from),
        var(--tw-gradient-to, rgba(0, 0, 0, 0));
}

h4 {
    color: var(--text-color, var(--theme-primary-darkest));
}

.divider {
    background: var(--text-color, var(--theme-primary-darkest));
}

button,
.button {
    background: var(--button-background, var(--theme-primary-darkest));
    color: var(--button-text, #fff);
}

input {
    border-color: var(--border-color, var(--theme-primary-darkest));
}
</style>
<template>
    <div>
        <div
            class="flex flex-col h-screen bg-theme-primary-lightest"
            @click="openModal()"
        >
            <main class="flex-1 text-center">
                <h4
                    class="inline-block mt-60 border-2 font-medium p-2 text-5xl"
                >
                    MENU
                </h4>
            </main>

            <div class="w-full">
                <div class="text-center text-3xl mb-8">
                    <h4 class="mb-2 font-bold">
                        {{ restaurant.name }}
                    </h4>

                    <div class="h-1 divider w-24 m-auto"></div>
                </div>

                <div class="start-button py-8 text-center bg-gradient-to-t">
                    <p class="text-xl text-white font-medium shadow-sm">
                        Klik untuk memulai
                    </p>
                </div>
            </div>
        </div>

        <modal-component ref="startOrderModal">
            <p class="mb-2 text-center font-medium text-lg">
                Silahkan masukkan nama anda dan nomor meja untuk mulai memesan
            </p>

            <div class="form-group m-0 mb-3">
                <input
                    type="text"
                    name="table"
                    v-model="table"
                    placeholder="Nomor Meja"
                    class="p-2 rounded text-xl w-full text-center border-2 border-green-400 focus:outline-none"
                />

                <span v-if="this.errors.table">{{ this.errors.table }}</span>
            </div>

            <div class="form-group m-0 mb-3">
                <input
                    type="text"
                    name="customer_name"
                    ref="name"
                    v-model="customer_name"
                    placeholder="Masukan Nama"
                    v-if="this.table_id"
                    class="p-2 rounded text-xl w-full text-center border-2 border-green-400 focus:outline-none"
                />
            </div>

            <button
                v-if="this.table_id == null"
                class="p-2 text-xl w-full rounded"
                @click="login()"
            >
                CEK MEJA
            </button>

            <button
                v-if="this.table_id"
                class="p-2 text-xl w-full rounded"
                @click="reservation()"
            >
                Pilih Meja Ini
            </button>

            <p class="my-3 text-center font-medium text-gray-400 text-lg">
                - atau -
            </p>

            <a
                :href="menu_url"
                class="p-2 text-xl block text-center button w-full rounded"
            >
                LIHAT MENU
            </a>
        </modal-component>
    </div>
</template>
<script>
export default {
    props: {
        url: String,
        restaurant: Object,
        showModal: Boolean,
        menu_url: String
    },

    data: function() {
        return {
            errors: {
                table: null
            },
            table: null,
            customer_name: null,
            table_id: null
        };
    },

    methods: {
        login() {
            const data = {
                table: this.table
            };

            const url = `/restaurants/${this.restaurant.id}/table/findTable`;

            axios.post(url, data).then(response => {
                this.table_id = response.data.table_id ?? null;

                if (this.table_id == null) {
                    this.errors.table = response.data.message;
                }

                if (this.table_id) {
                    this.errors.table = false;

                    this.$nextTick(() => this.$refs.name.focus());
                }
            });
        },

        reservation() {
            const data = {
                table_id: this.table_id,
                customer_name: this.customer_name
            };

            const url = `/restaurants/${this.restaurant.id}/cart/reservation`;

            axios.post(url, data).then(response => {
                if (response.data.status == "OK") {
                    window.location.href = this.menu_url;
                }
            });
        },

        openModal() {
            this.$refs.startOrderModal.showModal();
        }
    }
};
</script>
