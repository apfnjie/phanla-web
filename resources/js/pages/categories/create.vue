<template>
<div class="bg-grey-lighter py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-9 m-auto">
        <div v-if="success_alert" class="bg-green-lightest border-l-4 border-green text-green-dark p-4" role="alert">
          <p class="font-bold">Success</p>
          <p>The category has been successfully added! <router-link class="text-success font-bold" :to="{name: 'categories.all'}">View Categories</router-link></p>
        </div>

        <div v-if="!success_alert" class="bg-white card p-3">
          <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
            <h3 class="text-accent mb-4 ml-2">Create Category</h3>

            <div class="col-md-7">
              <div class="form-group mb-3">
                <label for="" class="block text-sm font-bold text-grey-darker">Name</label>
                <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }"  type="text" class="form-control" name="name"/>
                <has-error :form="form" field="name" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group mb-5">
                <label for="" class="block text-sm font-bold text-grey-darker">Description</label>
                <textarea v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }" name="description" id="" class="form-control"></textarea>
                <has-error :form="form" field="description" />
              </div>
            </div>

            <div class="col-md-12">
              <router-link :to="{name: 'categories.all'}" class="btn btn-link ml-3 float-md-right">
                Cancel
              </router-link>

              <v-button class="btn btn-primary float-md-right">
                <fa icon="plus-square" fixed-width /> Create Category
              </v-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import Form from "vform";
export default {
  metaInfo() {
    return { title: "Create Category" };
  },

  data: () => ({
    success_alert: false,
    form: new Form({
      name: "",
      description: ""
    })
  }),

  methods: {
    async submit() {
      const { data, status } = await this.form.post("/api/categories");
      console.log(data);

      this.success_alert = status === 201 ? true : false;
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
