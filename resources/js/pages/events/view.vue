<template>
  <div>
    <div class="bg-grey-lightest flex-col lg:flex lg:flex-row">
      <div class="lg:w-1/2">
        <img
          class="w-full"
          :src="(event.banner != null) ? event.banner : 'https://www.starjournalnow.com/wp-content/uploads/2018/07/EVENTS-GRAPHIC_web.jpg'"
          alt
        >
      </div>

      <div class="bg-grey-lighter lg:w-1/2 p-5">
        <h6 class="block text-grey-darker text-sm mb-3 font-bold">
          <fa icon="calendar-alt" fixed-width/>
          {{formatTime(event.time)}}
        </h6>
        <h2 class="text-accent event-title block text-4x1 mb-3 font-bold">{{event.name}}</h2>
        <div class="flex mb-3">
          <span
            class="text-blue-dark text-lg mr-2"
            v-for="(data, index) in event.categories"
            :key="index"
          >{{ '#' + data.name }}</span>
        </div>

        <h6 class="block text-grey-darker text-sm font-bold mb-3 text-lg">
          <fa icon="map-marker-alt" fixed-width/>
          {{event.location}}
        </h6>
        <h6
          class="block text-grey-darker text-sm mb-3"
        >&nbsp;&nbsp;&nbsp;by {{event.created_by.name}}</h6>
        <template v-if="event.fee === null || event.fee === 0">
          <h4 class="text-primary">&nbsp;&nbsp;&nbsp;Free</h4>
        </template>

        <template v-else>
          <h4 class="text-primary">&nbsp;&nbsp;&nbsp;{{'D' + event.fee}}</h4>
        </template>
      </div>
    </div>
    <div class="bg-white pb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 bg-white m-auo p-5 border border-grey-lighter shadow -mt-10">
            <h5 class="block text-grey-darker text-sm font-bold mb-3">Description</h5>
            <p class="text-sm">{{event.description}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  metaInfo() {
    return {
      title: "View"
    };
  },

  data() {
    return {
      img: require("../../assets/background.jpg"),
      months: [
        "January",
        "Febuary",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ],
      day: ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"],
      event: {
        name: "",
        location: "",
        time: null,
        description: "",
        created_by: {
          name: ""
        }
      }
    };
  },

  mounted() {
    this.index();
  },

  methods: {
    async index() {
      axios.get("/api/events/" + this.$route.params.event).then(response => {
        const { data, status } = response;
        console.log(data);
        this.event = data.data;
      });
    },

    formatTime(time) {
      time = new Date(time);
      return (
        this.day[time.getDay()] +
        ", " +
        this.months[time.getMonth()] +
        " " +
        time.getDate() +
        ", " +
        time.getHours() +
        ":" +
        time.getMinutes()
      );
    }
  }
};
</script>

<style lang="scss" scoped>
.event-title {
  // font-size: 24px;
}
</style>
