<template>
  <div class="bg-green-dark text-center py-4 lg:px-4 mb-4">
    <div
      class="p-2 bg-green items-center text-indigo-lightest leading-none lg:rounded-full flex lg:inline-flex"
      role="alert"
    >
      <span
        class="flex rounded-full bg-green-dark uppercase px-2 py-1 text-xs font-bold mr-3"
      >Success</span>
      <span class="mr-2 text-left flex-auto">{{ message }}</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Success",

  props: {
    message: {
      type: String,
      required: true
    }
  }
};
</script>
