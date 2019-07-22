<template>
  <div @click="toggleModal">
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: ["route"],

  data() {
    return {
      show: false
    };
  },

  methods: {
    toggleModal() {
      Event.$emit("toggleModal", this.route);
    }
  }
};
</script>

