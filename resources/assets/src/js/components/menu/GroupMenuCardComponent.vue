<style lang="scss" scoped>
.card-body {
  background: var(--menu-card-background, #fff);
}

.menu-card-border {
  border-color: var(--menu-card-border);
}

.card-body {
  p {
    color: var(--menu-card-text, #6b7280);
  }

  p.qty {
    color: var(--menu-card-text-darker, #111827);
  }
}
</style>
<template>
  <div class="card-body p-2 rounded-b w-full">
    <a :href="menu.url" class="grid p-2 grid-cols-12 border-b menu-card-border">
      <div class="col-span-2">
        <div class="rounded-full w-8 h-8 border-2 menu-card-border">
          <p class="w-full text-center">{{ menu.position }}</p>
        </div>
      </div>

      <div class="col-span-6">
        <p class="text-xl font-medium">{{ menu.name }}</p>
      </div>

      <div class="col-span-2 text-right">
        <p class="text-xl font-medium">{{ menu.price }}</p>
      </div>

      <div class="col-span-2 text-center">
        <p class="text-xl font-medium qty">{{ menu.position }}</p>
      </div>
    </a>
  </div>
</template>
<script>
export default {
  props: ["menu"],

  mounted() {
    console.log(this.menu);
  },
};
</script>
