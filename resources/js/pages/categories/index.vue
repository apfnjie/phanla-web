<template>
  <transition name="fade" mode="out-in">
    <router-view/>
  </transition>
</template>

<script>
export default {
  middleware: ["auth", "admin"]
};
</script>

<style lang="scss" scoped>
</style>
