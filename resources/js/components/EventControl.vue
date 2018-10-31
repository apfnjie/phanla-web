<template>
<div class="card  mb-2">
  <div class="bg-white p-3 d-flex justify-center">
    <div class="flex-1 py-2">
      <span class="text-accent event-title">{{event.name}}</span>
    </div>

    <div class="flex-1 d-flex pl-2">
      <div class="justify-center flex-grow-1 py-2 d-flex">
        <div class="flex-grow-1  justify-center">
          <span class="event-date">{{formatTime(event.time)}}</span> at
        <span class="event-venue text-grey-dark">{{event.location}}</span>
        </div>


        <div class="py-1">
          <router-link :to="{name: 'events.edit', params: { event: event.tag}}" class="btn btn-sm bg-blue flex justify-center hover:bg-blue-dark text-white font-bold rounded mx-2">
            <fa icon="edit" fixed-width />
          </router-link>

          <router-link :to="{name: 'events.delete', params: { event: event.tag}}" class="btn btn-sm bg-red hover:bg-red-dark text-white font-bold rounded mx-2">
            <fa icon="trash" fixed-width />
          </router-link>
        </div>
      </div>

    </div>
  </div>
</div>
</template>

<script>
export default {
  name: "EventControl",

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
        time.getMinutes()
      );
    }
  }
};
</script>

<style lang="scss" scoped>
.event-title {
  font-size: 18px;
}

.event-venue {
  font-size: 14px;
}

.event-date {
  font-size: 14px;
  font-weight: 600;
}
</style>
