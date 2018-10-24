<template>
<div class="card p-3 mb-3 border">
  <h5 class="text-accent">{{category.name}}</h5>
  <p class="category-description text-grey-darker block">{{category.description}}</p>
  <div>
    <router-link :to="{name: 'categories.edit', params: {category: category.category_id }}" class="btn text-info btn-sm">
      <fa icon="edit" fixed-width />
    </router-link>

    <router-link :to="{name: 'categories.delete', params: {category: category.category_id }}"  class="btn text-danger btn-sm float-md-right">
      <fa icon="trash" fixed-width />
    </router-link>
  </div>
</div>
</template>

<script>
export default {
  name: "Category",

  props: {
    category: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
.category-description {
  font-size: 13px;
}
</style>
