<template>
<div class="bg-accent">
  <div class="container p-8 pb-1">
    <div class="sm:flex mb-4">
      <div class="sm:w-1/3 px-3 h-auto">
        <div class="text-white mb-3 font-bold">PHANLA</div>
        <ul class="list-reset leading-normal">
          <li class="hover:text-grey-light text-grey-darker text-sm py-2">About Us</li>
          <li class="hover:text-grey-light text-grey-darker text-sm py-2">Our Team</li>
        </ul>
      </div>

      <div class="sm:w-1/3 px-3 h-auto sm:mt-0 mt-8">
        <div class="text-white mb-3 font-bold text-sm">CONNECT</div>
        <ul class="list-reset leading-normal">
          <li class="hover:text-grey-light text-grey-darker text-sm py-2">Facebook</li>
          <li class="hover:text-grey-light text-grey-darker text-sm py-2">Twitter</li>
        </ul>
      </div>

      <div class="sm:w-1/3 px-3 h-auto sm:mt-0 mt-8">
        <div class="text-white mb-3 font-bold text-sm">CONTACT</div>
        <ul class="list-reset leading-normal">
          <li class="hover:text-grey-light border-b-1 text-grey-dark text-sm py-2">Phone: +220 3343008 / +220 7666047</li>
          <li class="hover:text-grey-light border-b-1 text-grey-dark text-sm py-2">Email: info@phanla.com</li>
        </ul>
      </div>

    </div>

      <div class=" flex-1 d-flex justify-center">
        <p class="text-grey-dark text-sm">Copyright &copy; Phanla 2018</p>
      </div>
  </div>
</div>
</template>

<script>
export default {
  name: "AppFooter"
};
</script>

<style lang="scss" scoped>
.list-reset li {
  border-bottom: 1px solid #2f3b4d;
}
.list-reset li:last-child {
  border-bottom: none;
}
</style>
