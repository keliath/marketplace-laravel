<template>
  <div>
    <input
      type="file"
      name="second_image"
      id="second_image"
      @change="onFileChange"
      class="custom-file-upload"
      
    />
    <div id="preview">
      <img v-if="url" :src="url" alt="" width="100" accept="image/*" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url: "",
    };
  },
  methods: {
    onFileChange(e) {
      console.log(e);
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
  },
};
</script>