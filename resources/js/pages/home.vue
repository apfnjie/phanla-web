<template>
<div>
  <div class="bg-grey-lighter" :style="{backgroundImage: 'url(' + img + ')', backgroundSize: 'contain'}">
    <div class="container py-20">
      <div class="row">
        <div class="col-md-8 m-auto">
          <div class="search d-flex overflow-hidden shadow-lg">
            <input type="text" class="form-input border flex-grow-1 text-accent" placeholder="Search Events"/>
            <button class="form-button btn-primary rounded-l-none">Search</button>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8 m-auto">
          <div class="d-flex justify-center my-10">
            <h1 class="text-white category-search">I am looking for...</h1>
          </div>
        </div>

        <div class="col-md-10 m-auto">
          <div class="w-full inline-flex justify-center flex-wrap">
            <div v-for="category in categories" :key="category.category_id" class="category shadow-lg bg-white rounded-full py-2 px-4 justify-center m-2"><span class="text-accent">{{category.name}}</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-tomato py-16 px-4 flex justify-center">
    <p class="text-white call-to-action">Do you have an event? <router-link :to="{ name: 'events.create'}" class="ml-2 btn bg-white rounded shadow call-to-action">Register with us</router-link></p>
  </div>

  <div class="bg-white py-16 px-4">
    <div class="container">
      <h1 class="text-accent mb-5">Events </h1>
      <div class="row">
        <div v-for="data in events" :key="data.event_id" class="col-md-4">
          <Event v-bind:event="data" />
        </div>
      </div>
    </div>
  </div>



  <!-- <div class="bg-grey-lighter py-16 px-4">
    <div class="container">
      <h1 class="text-accent mb-5">Our Top Picks</h1>
      <div class="row">
        <div class="col-md-4">
          <Event />
        </div>

        <div class="col-md-4">
          <Event />
        </div>

        <div class="col-md-4">
          <Event />
        </div>

        <div class="col-md-4">
          <Event />
        </div>

        <div class="col-md-4">
          <Event />
        </div>

        <div class="col-md-4">
          <Event />
        </div>
      </div>
    </div>
  </div> -->

</div>
</template>

<script>
import axios from "axios";
import Event from "../components/Event";
export default {
  metaInfo() {
    return {
      title: this.$t("home")
    };
  },

  components: {
    Event
  },

  data() {
    return {
      img: require("../assets/background.jpg"),
      categories: [],
      events: [],
      pagination: {
        current_page: 1
      }
    };
  },

  mounted() {
    this.index();
    this.fetchCategories();
  },

  methods: {
    async index() {
      axios
        .get("/api/events?page=" + this.pagination.current_page)
        .then(response => {
          const { data, status } = response;
          this.events = data.data;
          this.pagination = data.meta;
        });
    },

    async fetchCategories() {
      axios.get("/api/categories").then(response => {
        const { data } = response;
        this.categories = data.data;
        console.log(this.categories);
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.call-to-action {
  font-size: 2.5rem;
  font-weight: 700;
}

.form-input {
  width: 100%;
  padding: 25px;
  background-color: white;
}

.form-button {
  padding: 25px;
}

.category-search {
  font-weight: 800;
}

.category {
  width: auto;
}
</style>
