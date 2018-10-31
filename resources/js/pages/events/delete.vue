<template>
<div class="bg-grey-lighter py-10">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-10 m-auto">
        <div class="border bg-white rounded p-6">
          <h4 class="text-danger mb-5">Delete Event</h4>
          <form @submit.prevent="destroy" @keydown="form.onKeydown($event)">
            <div class="row mb-3">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Event Title</label>
                  <input v-model="form.name" disabled type="text" class="form-control"/>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Venue</label>
                  <input v-model="form.location" disabled type="text" class="form-control"/>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Date & Time</label>
                  <input v-model="form.time" disabled type="datetime-local" class="form-control"/>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Fee (D)</label>
                  <input v-model="form.fee" disabled type="number" class="form-control" value="0"/>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Description</label>
                  <textarea v-model="form.description" disabled name="" rows="5" class="form-control"></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <router-link :to="{name: 'events.all'}" class="btn btn-link ml-3 float-md-right">
                  Cancel
                </router-link>

                <v-button class="btn btn-danger float-md-right">
                  <fa icon="trash" fixed-width /> Delete Event
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
import axios from "axios";
import Form from "vform";
export default {
  metaInfo() {
    return {
      title: "Delete Event"
    };
  },

  middleware: "auth",

  data() {
    return {
      form: new Form({
        name: "",
        location: "",
        description: "",
        time: null,
        fee: null
      })
    };
  },

  mounted() {
    this.index();
  },

  methods: {
    async index() {
      console.log(this.$route.params);
      axios.get("/api/events/" + this.$route.params.event).then(response => {
        const { data, status } = response;
        this.form.name = data.data.name;
        this.form.description = data.data.description;
        this.form.location = data.data.location;
        this.form.fee = data.data.fee;
        this.form.time = data.data.time;

        console.log(response);
      });
    },

    async destroy() {
      const { data, status } = await this.form.delete(
        "/api/events/" + this.$route.params.event
      );
      console.log(data);
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
