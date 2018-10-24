<template>
<div>
  <div class="bg-grey-lighter d-flex">
    <div class="flex-auto w-1/2">
      <img src="https://tailwindcss.com/img/card-top.jpg" alt="" height="100px">
    </div>

    <div class="bg-grey-lighter flex-auto w-1/2 p-5">
      <h6 class="block text-grey-darker text-sm mb-3 font-bold"><fa icon="calendar-alt" fixed-width/> Wed, October 23rd, 5:00pm</h6>
      <h2 class="text-accent event-title block text-4x1 mb-3">Annual Youth Bantaba</h2>
      <h6 class="block text-grey-darker text-sm font-bold mb-3"><fa icon="map-marker-alt" fixed-width/> 86 Jabang Estate, West Coast Region</h6>
      <h6 class="block text-grey-darker text-sm mb-5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by The Gambia Red Cross Society</h6>
      <h4 class="text-primary">&nbsp;&nbsp;&nbsp;Free</h4>
    </div>
  </div>
  <div class="bg-white pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 bg-white m-auo p-5 border border-grey-lighter shadow -mt-16">
          <h5 class="block text-grey-darker text-sm font-bold mb-3">Description</h5>
          <p class="text-sm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium dolore ipsa at repellendus consectetur optio magnam placeat molestias ad, libero illum non inventore doloremque enim hic! Rerum debitis iure accusamus!</p>

          <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos eaque hic porro, sapiente sed earum iste, fuga cupiditate saepe doloremque animi, incidunt debitis? Nesciunt iure, tenetur distinctio quas necessitatibus consectetur.</p>
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
      title: "View"
    };
  },

  data() {
    return {
      img: require("../../assets/background.jpg")
    };
  }
};
</script>

<style lang="scss" scoped>
.event-title {
  // font-size: 24px;
}
</style>
