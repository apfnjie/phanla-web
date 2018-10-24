<template>
<div class="bg-grey-lighter py-10">
  <div class="container">
    <div class="row mb-8">
      <div class="col-md-8 m-auto">
        <div class="search d-flex overflow-hidden">
          <input type="text" class="form-input border flex-grow-1 text-accent" placeholder="Search Categories"/>
          <button class="form-button btn-primary rounded-l-none">Search</button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="card p-3 mb-3">
          <h5 class="text-accent">Category</h5>
          <p class="category-description text-grey-darker">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, voluptatum. Facere fugiat repudiandae, soluta ipsum quos sapiente modi.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.form-input {
  width: 100%;
  padding: 15px;
  background-color: white;
}

.form-button {
  padding: 15px;
}

.category-description {
  font-size: 13px;
}
</style>
