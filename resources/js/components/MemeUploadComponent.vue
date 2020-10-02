<template>
  <div>
    <a @click.prevent="show = !show" href="">
      {{ show ? "Nevermind" : "Add Meme" }}</a
    >

    <form
      v-if="show"
      method="POST"
      action="/memes"
      enctype="multipart/form-data"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <div class="custom-file">
        <input
          @input="processImage"
          type="file"
          class="custom-file-input"
          name="meme"
        />
        <label class="custom-file-label" for="customFile">Choose file</label>
        <div class="btn-group mt-2 d-flex justify-content-end" role="group">
          <div class="w-25 d-flex justify-content-end">
            <button type="button" class="btn btn-danger mr-1" @click="clear">
              Cancel
            </button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </div>
      <div class="image-container w-75 mx-auto mt-2">
        <img v-if="encodedImage" class="img-fluid" :src="encodedImage" />
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      meme: null,
      encodedImage: null,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    processImage(e) {
      const [file] = e.target.files;
      this.meme = file;

      const reader = new FileReader();

      reader.onload = (e) => (this.encodedImage = e.target.result);

      reader.readAsDataURL(this.meme);
    },
    handleUpload(e) {
      e;
    },
    clear() {
      this.meme = null;
      this.encodedImage = null;
    },
  },
};
</script>

<style>
</style>