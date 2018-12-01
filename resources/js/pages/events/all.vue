<template>
  <div class="bg-grey-lighter py-10">
    <div class="container">
      <div class="row mb-8">
        <div class="col-md-8 m-auto">
          <div class="search d-flex overflow-hidden">
            <input
              @keyup="index"
              v-model="search"
              type="text"
              class="form-input border flex-grow-1 text-accent"
              placeholder="Search Events"
            >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <event-control v-bind:event="data" v-for="data in events" :key="data.event_id"/>
          <div>
            <pagination
              class="float-md-right"
              :pagination="pagination"
              @paginate="index()"
              :offset="4"
            ></pagination>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import EventControl from "../../components/EventControl";
export default {
  metaInfo() {
    return { title: "Events" };
  },

  middleware: "auth",

  components: {
    EventControl
  },

  data() {
    return {
      search: "",
      pagination: {
        current_page: 1
      },
      events: []
    };
  },

  mounted() {
    this.index();
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
          this.events = response.data.data;
          this.pagination = response.data.meta;
          console.log(this.events);
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

.event-title {
  font-size: 18px;
}

.event-venue {
  font-size: 14px;
}

.event-date {
  font-size: 14px;
  font-weight: 700;
}
</style>
