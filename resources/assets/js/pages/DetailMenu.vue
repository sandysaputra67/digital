<template>
  <div v-if="menu.data">
    <main class="flex-1 overflow-y-auto">
      <img :src="menu.data.image" alt="Menu Image" />

      <div class="px-4">
        <div class="grid grid-cols-12 py-2">
          <div class="col-span-8 grid grid-cols-12 py-2">
            <div class="col-span-3">
              <div class="rounded-full w-8 h-8 border-2 border-gray-500">
                <p class="w-full r text-center text-gray-800">1</p>
              </div>
            </div>

            <div class="col-span-9">
              <span class="inline-block align-middle">
                <p class="text-2xl text-gray-800">{{ this.menu.data.name }}</p>
              </span>
            </div>
          </div>

          <div class="col-span-4 py-2 text-right">
            <span class="inline-block align-middle">
              <p class="text-2xl text-gray-800">{{ this.menu.data.price }}</p>
            </span>
          </div>
        </div>

        <p class="text-justify font-medium text-gray-600">
          {{ this.menu.data.description }}
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

    <div class="fixed inset-x-0 bottom-0">
      <div class="grid grid-cols-3 bg-green-200">
        <button class="text-4xl text-gray-800" v-on:click="minus">-</button>
        <div class="p-2">
          <input
            type="tel"
            name="number"
            v-model="qty"
            class="w-full h-full text-2xl font-bold text-center px-4 py-2 border-2 border-gray-600 focus:outline-none"
          />
        </div>
        <button class="text-4xl text-gray-800" v-on:click="qty += 1">+</button>
      </div>

      <div class="grid grid-cols-2">
        <a :href="this.url_back" class="bg-green-300 text-2xl font-medium p-4"
          >BATAL</a
        >
        <button
          class="bg-green-300 text-2xl font-medium p-4"
          v-on:click="addToCart"
        >
          TAMBAH
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    restaurant: Object,
    menu_id: null,
    url_back: { type: String, required: true },
  },

  data: function () {
    return {
      menu: Object,
      qty: 1,
      note: "",
    };
  },

  created: function () {
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

      axios.get(url).then((response) => {
        this.menu = response.data;
      });
    },

    addToCart() {
      const data = {
        qty: this.qty,
        note: this.note,
        menu_id: this.menu_id,
      };

      const url = `/restaurants/${this.restaurant.id}/cart/add-to-cart`;

      axios.post(url, data).then((response) => {
        if (response.data.status == "OK") {
          window.location.href = response.data.redirect;
        }
      });
    },
  },
};
</script>