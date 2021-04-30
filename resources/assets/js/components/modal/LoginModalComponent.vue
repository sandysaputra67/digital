<template>
  <div class="modal fade" data-keyboard="false" id="startOrderModal">
    <div class="modal-dialog mt-60">
      <div class="modal-content">
        <div class="modal-body">
          <p class="mb-2 text-center text-lg">
            Silahkan masukkan nama anda dan nomor meja untuk mulai memesan
          </p>

          <div class="form-group m-0 mb-3">
            <input
              type="number"
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
            class="p-2 text-xl text-white w-full rounded bg-green-600 hover:bg-green-700"
            @click="login()"
          >
            Cek Ketersedian Meja
          </button>

          <button
            v-if="this.table_id"
            class="p-2 text-xl text-white w-full rounded bg-green-600 hover:bg-green-700"
            @click="reservation()"
          >
            Pilih Meja Ini
          </button>

          <p class="my-3 text-center text-gray-400 text-lg">- atau -</p>

          <a
            href="#"
            class="p-2 text-xl block text-center text-green-800 hover:text-green-800 hover:no-underline w-full rounded bg-green-200 hover:bg-green-400"
            >LIHAT MENU</a
          >
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  props: { url: String, restaurant_id: Number },

  data: function () {
    return {
      errors: {
        table: null,
      },
      table: null,
      customer_name: null,
      table_id: null,
    };
  },

  template: "#modal-login-customer",

  methods: {
    login() {
      const data = {
        table: this.table,
      };

      const url = "/restaurants/" + this.restaurant_id + "/table/findTable";

      axios.post(url, data).then((response) => {
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
        customer_name: this.customer_name,
      };

      const url = "/restaurants/" + this.restaurant_id + "/table/reservation";

      axios.post(url, data).then((response) => {
        if (response.data.status == "OK") {
          window.open();
        }
      });
    },
  },
};
</script>
