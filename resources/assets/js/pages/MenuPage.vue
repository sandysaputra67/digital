<template>
    <div class="p-2">
        <p v-if="featured_menu_data" class="text-xl px-2 font-medium">
            {{ featured_menu_data.featured_data.name }}
        </p>

        <div class="grid grid-cols-2">
            <div class="col-span-2">
                <div class="p-2 block" v-if="featured_menu_data">
                    <img
                        :src="featured_menu_data.featured_data.image"
                        class="rounded-t"
                        alt="Menu Image"
                    />

                    <group-menu-card-component
                        v-for="(menu, index) in featured_menu_data.menus"
                        :key="`menu-${index}`"
                        :menu="menu"
                    ></group-menu-card-component>
                </div>
            </div>

            <div class="col-span-1">
                <single-menu-card-component
                    v-for="(menu, index) in menu_with_image"
                    :key="`menu-${index}`"
                    :menu="menu"
                ></single-menu-card-component>
            </div>

            <div class="col-span-2">
                <single-menu-card-component
                    v-for="(menu, index) in menu_only_text"
                    :key="`menu-${index}`"
                    :menu="menu"
                ></single-menu-card-component>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        restaurant: Object
    },

    data: function() {
        return {
            featured_menu_data: null,
            menu_with_image: null,
            menu_only_text: null
        };
    },

    created: function() {
        this.getMenus();
    },

    methods: {
        getMenus() {
            const url = `/restaurants/${this.restaurant.id}/get-menu`;

            axios.get(url).then(response => {
                this.featured_menu_data =
                    response.data.data_menu.featured_menus;
                this.menu_with_image = response.data.data_menu.menu_with_image;
                this.menu_only_text = response.data.data_menu.menu_only_text;
            });
        }
    }
};
</script>
