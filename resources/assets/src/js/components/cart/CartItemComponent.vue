<template>
  <div class="grid grid-cols-12 py-2 px-2 border-b-2">
    <div class="col-span-8 py-2">
      <span class="inline-block align-middle">
        <p class="text-xl text-green-600 font-medium">{{ this.cart.menu.name }}</p>
        <p class="text-base text-gray-600">{{ this.cart.note }}</p>
      </span>
    </div>

    <div class="col-span-4 grid grid-cols-2 py-2 text-right">
      <div>
        <p class="text-xl text-gray-800">{{ this.cart.base_total }}</p>
      </div>

      <div>
        <input
          type="number"
          :value="cart.quantity"
          class="ml-2 border border-gray-600 w-10 h-9 text-center text-xl"
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["cart"],

  mounted() {
    console.log(this.cart);
  },
};
</script>
