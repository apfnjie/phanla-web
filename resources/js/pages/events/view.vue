<template>
<div>
  <div class="bg-grey-lightest d-flex">
    <div class="flex-auto w-1/2">
      <img src="https://tailwindcss.com/img/card-top.jpg" alt="" height="100px">
    </div>

    <div class="bg-grey-lighter flex-auto w-1/2 p-5">
      <h6 class="block text-grey-darker text-sm mb-3 font-bold"><fa icon="calendar-alt" fixed-width/> {{formatTime(event.time)}}</h6>
      <h2 class="text-accent event-title block text-4x1 mb-3 font-bold">{{event.name}}</h2>
      <h6 class="block text-grey-darker text-sm font-bold mb-3"><fa icon="map-marker-alt" fixed-width/> {{event.location}}</h6>
      <h6 class="block text-grey-darker text-sm mb-5">&nbsp;&nbsp;&nbsp;by {{event.created_by.name}}</h6>
      <h4 class="text-primary">&nbsp;&nbsp;&nbsp;Free</h4>
    </div>
  </div>
  <div class="bg-white pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 bg-white m-auo p-5 border border-grey-lighter shadow -mt-16">
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
