<template>
  <svg
    version="1.1"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 231 231"
    xmlns:xlink="http://www.w3.org/1999/xlink"
    enable-background="new 0 0 231 231"
    @click="toggleMenu"
    class="fill-current text-gray-500 hover:text-gray-200 transition-color h-8 w-8 cursor-pointer"
  >
    <g>
      <rect width="181" x="50" y="164.5" height="33" />
      <rect width="181" x="50" y="99.5" height="33" />
      <rect width="181" x="50" y="32.5" height="33" />
      <rect width="33" y="165.5" height="33" />
      <rect width="33" y="99.5" height="33" />
      <rect width="33" y="32.5" height="33" />
    </g>
  </svg>
</template>

<script>
export default {
  props: ["avatar"],

  methods: {
    toggleMenu() {
      Event.$emit("toggle");
    }
  }
};
</script>
