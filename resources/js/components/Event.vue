<template>
<router-link :to="{ name: 'events.view', params: {event: 'EV-0001'}}">
  <div class="max-w-md mb-16 bg-white rounded overflow-hidden shadow hover:border">
    <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains"/>
    <div class="info py-4 px-3">
      <h5 class="event-title text-accent">Event title</h5>
      <span class="event-date text-grey-darker"><fa icon="calendar-alt" fixed-width/> Wed, Oct 23, 5:00pm</span>
      <span class="event-location text-grey-darker"><fa icon="map-marker-alt" fixed-width/> 86 Jabang Estate, West Coast Region</span>
    </div>
  </div>
</router-link>
</template>

<script>
export default {
  name: "Event"
};
</script>

<style lang="scss" scoped>
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
