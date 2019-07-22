<template>
  <div class="flex flex-col mt-4 items-baseline">
    <div class="flex -mx-4">
      <svg
        version="1.1"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 0 53.867 53.867"
        xml:space="preserve"
        class="h-8 w-8 mx-4 cursor-pointer"
        v-for="(star, index) in stars"
        :key="index"
      >
        <polygon
          class="transition fill-current"
          :class="isFilled(index) ? 'text-yellow-500' : 'text-gray-500'"
          @mouseover="fill(index)"
          @mouseleave="removeFill(index)"
          @click="vote(index)"
          points="26.934,1.318 35.256,18.182 53.867,20.887 40.4,34.013 43.579,52.549 26.934,43.798 
	10.288,52.549 13.467,34.013 0,20.887 18.611,18.182 "
        />
      </svg>
    </div>

    <div class="flex items-baseline text-xs tracking-widest mt-6 text-gray-400">
      <div class="mr-4" v-if="loggedIn">
        Your vote:
        <span class="text-yellow-500">{{ originalRating }}</span>
      </div>
      <div class="mr-4">
        Overall:
        <span class>{{ average }}</span>
        <span class="text-gray-500">/ {{ stars }}</span>
      </div>
      <div>Votes: {{ votes }}</div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["icon", "movie", "loggedIn"],

  data() {
    return {
      hovered: 5,
      stars: 5,
      rating: 0,
      originalRating: 0,
      votes: 0,
      average: 0
    };
  },

  created() {
    this.fetch();
  },

  methods: {
    fetch() {
      axios.get(`/ratings/${this.movie}`).then(({ data }) => {
        this.originalRating = this.calculateRating(data.ratings);
        this.rating = this.originalRating;
        this.votes = data.votes;
        this.average = data.average ? data.average : 0;
      });
    },

    fill(index) {
      this.rating = index + 1;
    },

    removeFill(index) {
      this.rating = this.originalRating;
    },

    isFilled(index) {
      return index + 1 <= this.rating;
    },

    calculateRating(ratings) {
      if (ratings.length > 0)
        return ratings.reduce((a, b) => a + b) / ratings.length;
    },

    vote(index) {
      axios
        .put(`/ratings/${this.movie}`, {
          vote: index + 1
        })
        .then(({ data }) => {
          this.average = data;
          this.originalRating = index + 1;
        });
    }
  }
};
</script>

<style>
.transition {
  transition: all 0.3s;
}
</style>

