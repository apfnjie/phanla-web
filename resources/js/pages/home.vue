<template>
  <div>
    <div
      class="bg-grey-lighter"
      :style="{backgroundImage: 'url(' + img + ')', backgroundSize: 'contain'}"
    >
      <div class="container py-20">
        <div class="row">
          <div class="col-md-8 m-auto">
            <div class="search d-flex overflow-hidden shadow-lg rounded-full">
              <input
                @keyup="index"
                v-model="search"
                type="text"
                class="form-input flex-grow-1 text-accent text-lg"
                placeholder="Search Events"
              >
              <!-- <button class="hover:bg-red form-button btn-primary rounded-l-none">Search</button> -->
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8 m-auto">
            <div class="d-flex justify-center my-10">
              <h1 class="text-accent category-search">I am looking for</h1>
            </div>
          </div>

          <div class="col-md-10 m-auto">
            <div class="w-full inline-flex justify-center flex-wrap">
              <div
                v-for="category in categories"
                :key="category.category_id"
                class="category shadow-lg bg-accent rounded-full py-2 px-4 justify-center m-2"
              >
                <span class="text-white">{{category.name}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="search === ''" class="bg-white">
      <div class="container py-20">
        <div class="row">
          <!-- <div class="col-md-10 m-auto "> -->
          <div class="col-md-6 flex justify-center">
            <img
              src="../assets/confused.jpg"
              class="rounded-full confused"
              alt
              width="350"
              height="350"
            >
          </div>
          <div class="col-md-6 pt-5">
            <h2 class="text-center mb-5">Having trouble keeping track of events happening nearby?</h2>
            <h1 class="text-center text-accent">We've got you covered</h1>
          </div>
          <!-- </div> -->
        </div>
      </div>
    </div>

    <div v-if="search === ''" class="bg-tomato py-16 px-4 flex justify-center">
      <p class="text-white call-to-action">Do you have an event?
        <router-link
          :to="{ name: 'events.create'}"
          class="ml-2 rounded text-white call-to-action underline"
        >Register it</router-link>
      </p>
    </div>

    <div class="bg-white py-16 px-4">
      <div class="container">
        <template v-if="search != ''">
          <h1 class="text-accent mb-5">Search results...</h1>
        </template>

        <template v-else>
          <h1 class="text-accent mb-5">Top Picks</h1>
        </template>

        <div class="row">
          <div v-for="data in events" :key="data.event_id" class="col-md-4">
            <Event v-bind:event="data"/>
          </div>
        </div>
      </div>
    </div>
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
      search: "",
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
        .get("/api/events?page=" + this.pagination.current_page, {
          params: {
            name: this.search
          }
        })
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
.confused {
  height: 350px !important;
}
.call-to-action {
  font-size: 2.5rem;
  font-weight: 700;
}

.form-input {
  width: 100%;
  padding: 25px;
  background-color: white;
}

.search {
  border: 2px solid tomato;
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
