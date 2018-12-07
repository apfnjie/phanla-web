<template>
  <router-link :to="{ name: 'events.view', params: {event: event.tag}}" class="event">
    <div class="max-w-md mb-16 bg-white rounded overflow-hidden card hover:border">
      <img
        class="h-48"
        :src="(event.banner != null) ? event.banner : 'https://www.starjournalnow.com/wp-content/uploads/2018/07/EVENTS-GRAPHIC_web.jpg'"
        alt="Sunset in the mountains"
      >
      <div class="info py-4 px-3">
        <h5 class="event-title text-accent">{{event.name}}</h5>
        <span class="event-date text-grey-darker">
          <fa icon="calendar-alt" fixed-width/>
          {{formatTime(event.time)}}
        </span>
        <span class="event-location text-grey-darker">
          <fa icon="map-marker-alt" fixed-width/>
          {{event.location}}
        </span>
      </div>
    </div>
  </router-link>
</template>

<script>
export default {
  name: "Event",

  data() {
    return {
      months: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sept",
        "Oct",
        "Nov",
        "Dec"
      ],
      day: ["Mon", "Tue", "Wed", "Thur", "Fri", "Sat", "Sun"]
    };
  },

  props: {
    event: {
      type: Object,
      required: true
    }
  },

  methods: {
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
        (time.getMinutes() === 0 ? "00" : time.getMinutes())
      );
    }
  }
};
</script>

<style lang="scss" scoped>
.event:hover {
  text-decoration: none;
}
.event-title {
  font-weight: 600;
}

.event-title {
  text-transform: capitalize;
}

.event-date,
.event-organizer,
.event-location {
  font-size: 13px;
  display: block;
  padding-top: 7px;
}
</style>
