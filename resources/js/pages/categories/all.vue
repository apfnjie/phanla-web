<template>
<div class="bg-grey-lightest py-10">
  <div class="container">
    <div class="row mb-8">
      <div class="col-md-8 m-auto">
        <div class="search d-flex overflow-hidden">

          <input v-model="search_name" @keyup="index" type="text" class="form-input border flex-grow-1 text-accent" placeholder="Search Categories"/>
          <router-link :to="{ name: 'categories.create'}" class="form-button btn-secondary bg-accent rounded-l-none"><fa icon="plus-square" fixed-width /></router-link>
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
          <pagination class="float-md-right" :pagination="pagination" @paginate="index()" :offset="4"></pagination>
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
    categories: [],
    pagination: {
      current_page: 1
    }
  }),

  components: {
    Category
  },

  mounted() {
    this.index();
  },

  methods: {
    async index() {
      axios
        .get("/api/categories?page=" + this.pagination.current_page, {
          params: {
            name: this.search_name
          }
        })
        .then(response => {
          this.categories = response.data.data;
          this.pagination = response.data.meta;
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
