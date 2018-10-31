<template>
<div class="bg-grey-lighter py-10">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-10 m-auto">
        <div class="border bg-white rounded p-6">
          <h4 class="text-accent mb-5">Create Event</h4>
          <form @submit.prevent="store" @keydown="form.onKeydown($event)">
            <div class="row mb-3">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Event Title</label>
                  <input v-model="form.name" name="name" type="text" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control"/>
                  <has-error :form="form" field="name" />
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Venue</label>
                  <input v-model="form.location" name="location" type="text" :class="{ 'is-invalid': form.errors.has('location') }" class="form-control"/>
                  <has-error :form="form" field="location" />
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Date & Time</label>
                  <input v-model="form.time" name="time" type="datetime-local" :class="{ 'is-invalid': form.errors.has('time') }" class="form-control"/>
                  <has-error :form="form" field="time" />
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Fee (D)</label>
                  <input v-model="form.fee" name="fee" type="number" :class="{ 'is-invalid': form.errors.has('fee') }" class="form-control" value="0"/>
                  <has-error :form="form" field="fee" />
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Description</label>
                  <textarea v-model="form.description" name="description" rows="5" :class="{ 'is-invalid': form.errors.has('description') }" class="form-control"></textarea>
                  <has-error :form="form" field="description" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <router-link :to="{name: 'events.all'}" class="btn btn-link ml-3 float-md-right">
                  Cancel
                </router-link>

                <v-button class="btn btn-primary float-md-right">
                  <fa icon="plus-square" fixed-width /> Create Event
                </v-button>
              </div>
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
    return {
      title: "Create Event"
    };
  },

  middleware: "auth",

  data() {
    return {
      form: new Form({
        name: "",
        location: "",
        time: "",
        description: "",
        location: "",
        fee: null
      })
    };
  },

  methods: {
    async store() {
      const { data, status } = await this.form.post("/api/events");
      console.log(data);
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
