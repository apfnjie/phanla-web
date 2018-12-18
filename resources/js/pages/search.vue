<template>
  <div>
    <div
      class="bg-grey-lighter"
      :style="{backgroundImage: 'url(' + img + ')', backgroundSize: 'cover'}"
    >
      <div class="container py-20">
        <div class="row">
          <div class="col-md-8 m-auto">
            <h1 class="font-bold mb-3">Phanla</h1>
            <p
              class="leading-loose text-lg"
            >connects you with people who share the same passions and interest as you...
              <br>we are bring people closer
            </p>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 -mt-10 mx-auto bg-accent p-6 flex content-center">
            <label class="font-bold text-white">Category</label>
            <div class="px-4 flex-1">
              <multi-select
                v-model="category"
                :options="categories"
                @input="filter"
                :allow-empty="true"
              ></multi-select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 py-10">
            <div class="row">
              <div v-for="(data, index) in events" :key="index" class="col-md-4">
                <event :event="data"></event>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
import MultiSelect from "vue-multiselect";
import Event from "../components/Event";
export default {
  metaInfo() {
    return {
      title: "Search"
    };
  },

  data() {
    return {
      img: require("../assets/background.jpg"),
      categories: [],
      category: this.$route.query.category,
      events: []
    };
  },

  components: {
    Event,
    MultiSelect
  },

  mounted() {
    this.filter();
  },

  created() {
    axios.get("/api/categories?all").then(response => {
      const { data, status } = response;
      console.log("Home Categories", data, status);
      this.categories = data.data.map(item => item.name);
    });
  },

  methods: {
    async filter() {
      axios
        .get("/api/events?all", {
          params: {
            category: this.category
          }
        })
        .then(response => {
          const { data, status } = response;
          this.events = data.data;
          console.log("Events", data, status);
        });
    }
  }
};
</script>


<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>


