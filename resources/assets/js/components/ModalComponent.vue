<style lang="scss" scoped>
.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;

    .faster {
        -webkit-animation-duration: 500ms;
        animation-duration: 500ms;
    }
}

.fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn;
}

.fadeOut {
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut;
    display: none;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }

    to {
        opacity: 0;
    }
}
</style>
<template>
    <div
        v-bind:class="{ fadeIn: show, fadeOut: !show }"
        class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated faster"
    >
        <div
            @click="hideModal()"
            class="absolute w-screen h-screen left-0 top-0 z-20 bg-opacity-50 bg-black"
        ></div>

        <div class="bg-white p-4 mx-2 rounded-md z-40">
            <slot></slot>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            show: false
        };
    },

    methods: {
        hideModal() {
            this.show = false;
        },

        showModal() {
            this.show = true;
        }
    }
};
</script>
