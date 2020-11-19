<template>
  <div>
    <button
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModalCenter"
    >
      Add Meme
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              Sieze the memes of production!
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="/memes" enctype="multipart/form-data">
              <input type="hidden" name="_token" :value="csrf" />
              <div class="custom-file">
                <input
                  @input="processImage"
                  type="file"
                  class="custom-file-input"
                  name="meme"
                />
                <label class="custom-file-label" for="customFile"
                  >Choose file</label
                >
                <div
                  class="btn-group mt-2 d-flex justify-content-end"
                  role="group"
                >
                  <div class="w-25 d-flex justify-content-end">
                    <button
                      type="button"
                      class="btn btn-danger mr-1"
                      data-dismiss="modal"
                      @click="clear"
                    >
                      Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                      Upload
                    </button>
                  </div>
                </div>
              </div>
              <div class="image-container w-75 mx-auto mt-2">
                <img
                  v-if="encodedImage"
                  class="img-fluid"
                  :src="encodedImage"
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
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