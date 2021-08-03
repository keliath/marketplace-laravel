<template>
  <div>
    <button v-if="saveBtn" class="btn btn-info" @click.prevent="saveAd()">
      <i class="fas fa-heart"></i> Save this ad
    </button>

    <p v-else class="alert alert-success">Advertisment saved</p>
  </div>
</template>

<script>
export default {
  props: ["adId", "userId"],
  data() {
    return {
      saveBtn: true,
    };
  },
  methods: {
    saveAd() {
      // alert(`ad:${this.adId},user: ${this.userId}`);
      axios
        .post("/ad/save", {
          adId: this.adId,
          userId: this.userId,
        })
        .then((response) => {
          console.log(response);
          this.saveBtn = false;
        })
        .catch((err) => console.log(err));
    },
  },
};
</script>