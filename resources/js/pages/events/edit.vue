<template>
<div class="bg-grey-lighter py-10">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-10 m-auto">
        <div class="border bg-white rounded p-6">
          <h4 class="text-accent mb-5">Edit Event</h4>
          <form @submit.prevent="login" @keydown="form.onKeydown($event)">
            <div class="row mb-3">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Event Title</label>
                  <input type="text" class="form-control"/>
                </div>
              </div>

              <div class="col-md-4">
                <label class="block text-grey-darker text-sm font-bold mb-2">Category</label>
                <select name="" id="" class="form-control">
                  <option value="">Arts & Poetry</option>
                  <option value="">Sports</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Venue</label>
                  <input type="text" class="form-control"/>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Date & Time</label>
                  <input type="datetime-local" class="form-control"/>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Fee (D)</label>
                  <input type="number" class="form-control" value="0"/>
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2">Description</label>
                  <textarea name="" rows="5" class="form-control"></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <router-link :to="{name: 'events.all'}" class="btn btn-link ml-3 float-md-right">
                  Cancel
                </router-link>

                <v-button class="btn btn-primary float-md-right">
                  <fa icon="edit" fixed-width /> Edit Event
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
export default {
  metaInfo() {
    return {
      title: "Edit Event"
    };
  },

  middleware: "auth"
};
</script>

<style lang="scss" scoped>
</style>