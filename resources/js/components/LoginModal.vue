<template>
  <transition name="fade">
    <div
      class="h-screen w-full absolute top-0 flex justify-center items-center"
      style="background-color: rgba(0, 0, 0, 0.7);"
      v-if="isVisible"
      @click.self="hide"
    >
      <form
        @submit.prevent="login"
        class="flex flex-col p-6 bg-white rounded"
        style="width: 500px;"
      >
        <label for="email" class="text-gray-600 mt-6 mb-2">Email</label>
        <input
          type="text"
          name="email"
          v-model="form.email"
          class="border px-4 py-2 rounded text-gray-800"
        />

        <label for="password" class="text-gray-600 mt-6 mb-2">Password</label>
        <input
          type="password"
          name="password"
          v-model="form.password"
          class="border px-4 py-2 rounded text-gray-800"
        />

        <button
          type="submit"
          class="border mt-6 px-4 py-3 bg-green-600 font-semibold rounded hover:bg-green-500 relative focus:outline-none shadow-md transition-color"
          :class="isLoading ? 'is-loading' : ''"
        >Login</button>

        <div class="text-red-500 mt-4 font-semibold" v-if="feedback">
          <span v-text="feedback"></span>
        </div>
      </form>
    </div>
  </transition>
</template>

<script>
export default {
  mounted() {
    Event.$on("toggleModal", route => {
      if (route === "login") this.isVisible = !this.isVisible;
    });
  },

  data() {
    return {
      isVisible: false,
      isLoading: false,
      feedback: "",
      form: { email: "", password: "" }
    };
  },

  methods: {
    login() {
      this.isLoading = true;

      axios
        .post("/login", this.form)
        .then(() => {
          location.reload();
        })
        .catch(error => {
          this.isLoading = false;
          this.feedback = error.response.data.message;
        });
    },

    hide() {
      this.isVisible = false;
      this.feedback = "";
      this.form.email = "";
      this.form.password = "";
    }
  }
};
</script>

