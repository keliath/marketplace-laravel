<template>
  <div class="form-inline form-group mt-1">
    <div class="col-md-4">
      <select
        class="form-control"
        name="country_id"
        v-model="country"
        @change="getStates()"
      >
        <option value="">choose country</option>
        <option v-for="data in countries" :value="data.id" :key="data.id">
          {{ data.name }}
        </option>
      </select>
    </div>

    <div class="col-md-4">
      <select
        class="form-control"
        name="state_id"
        v-model="state"
        @change="getCities()"
      >
        <option value="">choose State</option>
        <option v-for="data in states" :value="data.id" :key="data.id">
          {{ data.name }}
        </option>
      </select>
    </div>

    <div class="col-md-4">
      <select class="form-control" name="city_id" v-model="city">
        <option value="">choose city</option>
        <option v-for="data in cities" :value="data.id" :key="data.id">
          {{ data.name }}
        </option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      country: 0,
      countries: [],
      state: 0,
      states: [],
      city: 0,
      cities: [],
    };
  },
  mounted() {
    this.getCountries();
  },
  methods: {
    getCountries() {
      axios.get("/api/country").then((Response) => {
        this.countries = Response.data;
      });
      // .bind(this);
    },
    getStates() {
      axios
        .get("/api/state", { params: { country_id: this.country } })
        .then((Response) => {
          this.states = Response.data;
        });
      // .bind(this);
    },
    getCities() {
      axios
        .get("/api/city", {
          params: { state_id: this.state },
        })
        .then((Response) => {
          this.cities = Response.data;
        });
      // .bind(this);
    },
  },
};
</script>