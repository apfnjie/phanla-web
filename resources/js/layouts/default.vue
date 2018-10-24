<template>
  <div class="main-layout">
    <navbar/>

    <child/>

    <app-footer/>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";
import AppFooter from "~/components/AppFooter";

export default {
  name: "MainLayout",

  components: {
    Navbar,
    AppFooter
  }
};
</script>

