<template>
  <div>
    <p>
      <button
        class="btn btn-success"
        v-if="displayBtn"
        @click.prevent="showNumber()"
      >
        <i class="fas fa-phone"></i>
        Show Number
      </button>
    </p>
    <p v-if="displayNumber">
      <span class="btn btn-danger" style="cursor: default">
        {{ phoneNumber }}
      </span>
    </p>
  </div>
</template>

<script>
export default {
  props: ["phoneNumber"],
  data() {
    return {
      displayNumber: false,
      displayBtn: true,
    };
  },
  methods: {
    showNumber() {
      this.displayNumber = true;
      this.displayBtn = false;
    },
  },
};
</script>