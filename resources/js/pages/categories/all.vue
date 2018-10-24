<template>
<div class="bg-grey-lighter py-10">
  <div class="container">
    <div class="row mb-8">
      <div class="col-md-8 m-auto">
        <div class="search d-flex overflow-hidden">
          <router-link :to="{ name: 'categories.create'}" class="form-button btn-secondary bg-accent rounded-l-none"><fa icon="plus-square" fixed-width /></router-link>
          <input v-model="search_name" @keyup="index" type="text" class="form-input border flex-grow-1 text-accent" placeholder="Search Categories"/>
          <!-- <button class="form-button btn-primary rounded-l-none">Search</button> -->
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div v-for="(category) in categories" :key="category.category_id" class="col-md-3">
        <category v-bind:category="category"/>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div>
          <ul class="pagination pagination-lg float-md-right">
            <li class="page-item disabled">
              <a class="page-link" href="#">&laquo;</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">&raquo;</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import Category from "../../components/Category";
import axios from "axios";
export default {
  metaInfo() {
    return { title: "Categories" };
  },

  data: () => ({
    search_name: "",
    categories: []
  }),

  components: {
    Category
  },

  mounted() {
    axios.get("/api/categories").then(response => {
      this.categories = response.data.data;
      console.log(this.categories);
      // console.log(response.data);
    });
  },

  methods: {
    async index() {
      axios
        .get("/api/categories", {
          params: {
            name: this.search_name
          }
        })
        .then(response => {
          this.categories = response.data.data;
          console.log(this.categories);
          // console.log(response.data);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.form-input {
  width: 100%;
  padding: 15px;
  background-color: white;
}

.form-button {
  padding: 15px;
}
</style>
