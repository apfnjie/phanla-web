<template>
<div>
  <div class="bg-white">
    <div class="container py-20">
      <div class="row">
        <div class="col-md-6 flex justify-center">
          <img src="../assets/about.jpg" class="rounded-full confused" alt="" width="350" height="350">
        </div>

        <div class="col-md-6 pt-5">
          <h3 class="text-right mb-5 text-accent font-bold">We are Phanla.</h3>

          <h4 class="text-right text-accent leading-normal">We recognize the power that resides in a group of commited people with a shared interest</h4>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-tomato">
    <div class="container py-20">
      <div class="row">
        <div class="col-md-10 m-auto">

          <img src="../assets/network.png" class="mb-4 mx-auto flex justify-center" alt="" width="350">
          <h4 class="text-center mb-12 leading-normal text-white">We are a team with a passion for connecting people with their passions and interest - connecting people with shared interest makes us happy. </h4>

          <!-- <h4 class="text-center mb-4 text-white leading-normal">We truly believe that the solving of any problem in our society starts by connecting people interested in such causes.</h4> -->
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  metaInfo() {
    return { title: "About Us" };
  }
};
</script>

<style lang="scss" scoped>
.confused {
  height: 350px !important;
}
</style>
