<template>
  <div class="mt-5 d-flex flex-column align-items-center">
    <template v-for="meme in memes">
      <div :key="meme.id" class="meme">
        <img
          class="img-fluid mt-5"
          :src="`/memes/content/${meme.public_name}`"
        />
      </div>
    </template>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      memes: [],
    };
  },
  async mounted() {
    const { data } = await axios.get("/memes");
    this.memes = data;
  },
};
</script>

<style>
.meme {
  width: 50%;
}
</style>