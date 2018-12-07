<template>
  <div class="bg-grey-lightest py-10">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-10 m-auto">
          <!-- Success alert -->
          <success v-if="success" message="Your event update was successful"/>

          <!-- Form -->
          <div class="card bg-white rounded p-6">
            <h4 class="text-accent mb-5">Edit Event</h4>
            <form @submit.prevent="update" @keydown="form.onKeydown($event)">
              <div class="row mb-3">
                <div class="col-md-7">
                  <div class="form-group">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Banner</label>
                    <input
                      @change="addBanner"
                      name="banner"
                      type="file"
                      :class="{ 'is-invalid': form.errors.has('banner') }"
                      class="form-control"
                    >
                    <has-error :form="form" field="banner"/>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Event Title</label>
                    <input
                      v-model="form.name"
                      name="name"
                      type="text"
                      :class="{ 'is-invalid': form.errors.has('name') }"
                      class="form-control"
                    >
                    <has-error :form="form" field="name"/>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Venue</label>
                    <input
                      v-model="form.location"
                      name="location"
                      type="text"
                      :class="{ 'is-invalid': form.errors.has('location') }"
                      class="form-control"
                    >
                    <has-error :form="form" field="location"/>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Date & Time</label>
                    <input
                      v-model="form.time"
                      name="time"
                      type="datetime-local"
                      :class="{ 'is-invalid': form.errors.has('time') }"
                      class="form-control"
                    >
                    <has-error :form="form" field="time"/>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Fee (D)</label>
                    <input
                      v-model="form.fee"
                      name="fee"
                      type="number"
                      :class="{ 'is-invalid': form.errors.has('fee') }"
                      class="form-control"
                      value="0"
                      step="0.01"
                    >
                    <has-error :form="form" field="fee"/>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="block text-grey-darker text-sm font-bold mb-2">Description</label>
                    <textarea
                      v-model="form.description"
                      name="description"
                      rows="5"
                      :class="{ 'is-invalid': form.errors.has('description') }"
                      class="form-control"
                    ></textarea>
                    <has-error :form="form" field="description"/>
                  </div>
                </div>
              </div>

              <div v-if="!success" class="row">
                <div class="col-md-12">
                  <router-link
                    :to="{name: 'events.all'}"
                    class="btn btn-link ml-3 float-md-right"
                  >Cancel</router-link>

                  <v-button class="btn btn-primary float-md-right">
                    <fa icon="edit" fixed-width/>Edit Event
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
import objectToFormData from "object-to-formdata";
export default {
  metaInfo() {
    return {
      title: "Edit Event"
    };
  },

  middleware: "auth",

  data() {
    return {
      success: false,
      form: new Form({
        banner: null,
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

    async update() {
      this.form
        .submit("post", "/api/events/" + this.$route.params.event, {
          transformRequest: [
            function(data, headers) {
              return objectToFormData(data);
            }
          ],
          onUploadProgress: e => {
            this.form.busy = true;
          }
        })
        .then(response => {
          const { data, status } = response;
          console.log("Edit event", data, status);
          this.success = true;
          window.scrollTo(0, 0);
          setTimeout(() => {
            this.$router.push({ name: "events.all" });
          }, 1000);
        });
    },

    addBanner() {
      const file = event.target.files[0];
      // Do some client side validation...
      this.form.banner = file;
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
