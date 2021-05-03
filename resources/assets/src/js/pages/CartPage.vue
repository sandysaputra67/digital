<template>
  <div class="flex flex-col h-screen bg-white">
    <header-component>
      <div class="grid grid-cols-12">
        <div class="col-span-9">
          <search-component></search-component>
        </div>

        <div class="col-span-3">
          <div class="grid grid-cols-2">
            <header-cart-button :url="'#'"></header-cart-button>
            <header-scan-qr-button :url="'#'"></header-scan-qr-button>
          </div>
        </div>
      </div>
    </header-component>

    <main class="flex-1 overflow-y-auto">
      <div>
        <div class="px-2">
          <cart-item-component
            v-for="(cart, index) in cartItems"
            :key="`cart-${index}`"
            :cart="cart"
          ></cart-item-component>
        </div>
        <div class="bg-gray-400 px-2">
          <div class="grid grid-cols-2 px-2 py-2">
            <div>
              <p class="text-white text-xl">Total pesanan baru</p>
            </div>
            <div>
              <p class="font-bold text-2xl text-gray-600 text-right">200.000</p>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div class="px-2"></div>
        <div class="bg-gray-400 px-2">
          <div class="grid grid-cols-2 px-2 py-2">
            <div>
              <p class="text-white text-xl"></p>
            </div>
            <div>
              <p class="font-bold text-2xl text-gray-300 text-right">200.000</p>
            </div>
          </div>
        </div>
      </div>
    </main>

    <div class="fixed inset-x-0 bottom-0 bg-green-200">
      <div class="grid grid-cols-2">
        <div>
          <p class="text-2xl font-medium text-green-600 p-4">Total</p>
        </div>
        <div>
          <p class="text-2xl font-bold text-green-600 p-4 text-right">
            200.000
          </p>
        </div>
      </div>
      <div class="grid grid-cols-2 text-center">
        <a href="#" class="bg-green-300 text-2xl font-medium p-4">KEMBALI</a>
        <a class="bg-green-300 text-2xl font-medium p-4">PESAN</a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    restaurant: Object,
  },

  data: function () {
    return {
      cartData: Object,
      cartItems: null,
    };
  },

  created: function () {
    this.getCart();
  },

  methods: {
    getCart() {
      const url = `/restaurants/${this.restaurant.id}/cart/get-cart`;

      axios.get(url).then((response) => {
        this.cartData = response.data.data_cart;
        this.cartItems = response.data.data_cart.items;

        console.log(this.cartItems);
      });
    },
  },
};
</script>