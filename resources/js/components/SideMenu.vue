<template>
  <div>
    <transition name="fade">
      <div
        class="w-screen h-screen absolute top-0 bg-black opacity-75 cursor-pointer"
        @click="toggle"
        v-if="this.show"
      ></div>
    </transition>

    <transition name="slide-fade">
      <div class="bg-gray-900 absolute h-screen top-0 right-0 w-64 py-8" v-if="this.show">
        <div class="flex flex-col items-center justify-between h-full">
          <h2
            class="bg-blue-600 inline-block h-20 w-20 text-3xl rounded-full flex items-center justify-center"
          >{{ avatar }}</h2>

          <div class="flex-1 w-full pl-10 mt-20">
            <ul class="mt-8">
              <li
                class="my-4 transition-color"
                v-for="route in routes"
                :key="route"
                :class="isActive(route)"
              >
                <a :href="getPath(route)">{{ route }}</a>
              </li>
            </ul>
          </div>
          <span
            class="cursor-pointer text-gray-700 hover:text-gray-500 transition-color"
            @click="logout"
          >Logout</span>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: ["currentRoute", "avatar"],

  data() {
    return {
      show: false,
      current: "",
      routes: ["Movies", "Genres", "Directors", "Playlist"],
      classes: "text-gray-700 hover:text-gray-500"
    };
  },

  mounted() {
    this.current = this.currentRoute.split("/")[0];

    Event.$on("toggle", () => this.toggle());
  },

  methods: {
    toggle() {
      this.show = !this.show;
    },

    isActive(route) {
      return this.current === route.toLowerCase()
        ? "text-blue-400 font-bold border-r-4 border-blue-400"
        : "text-gray-700 hover:text-gray-500";
    },

    getPath(route) {
      return `/${route.toLowerCase()}`;
    },

    logout() {
      axios.post("/logout").then(response => window.location.replace("/"));
    }
  }
};
</script>

<style>
.slide-fade-enter-active {
  transition: all 0.3s ease;
}
.slide-fade-leave-active {
  transition: all 0.3s;
}
.slide-fade-enter,
.slide-fade-leave-to {
  transform: translateX(200px);
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
