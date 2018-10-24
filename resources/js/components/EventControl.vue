<template>
<div class="card  mb-2">
  <div class="bg-white p-3 d-flex justify-center">
  <div class="flex-grow-1 py-2">
    <span class="text-accent event-title justify-center">Event Title</span>
  </div>

  <div class="flex-grow-1 d-flex">
    <div class="justify-center flex-grow-1 py-2">
      <span class="event-date">Sunday, 23rd December, 5:00pm</span> at
      <span class="event-venue text-grey-dark">QCity</span>
    </div>

    <div class="py-1">
      <router-link :to="{name: 'events.edit'}" class="btn btn-sm bg-blue flex justify-center hover:bg-blue-dark text-white font-bold rounded mx-2"><fa icon="edit" fixed-width /></router-link>

      <router-link :to="{name: 'events.delete'}" class="btn btn-sm bg-red hover:bg-red-dark text-white font-bold rounded mx-2"><fa icon="trash" fixed-width /></router-link>
    </div>
  </div>
</div>
</div>
</template>

<script>
export default {
  name: "EventControl"
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
