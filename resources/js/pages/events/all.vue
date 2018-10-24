<template>
<div class="bg-grey-lighter py-10">
  <div class="container">
    <div class="row mb-8">
      <div class="col-md-8 m-auto">
        <div class="search d-flex overflow-hidden">
          <input type="text" class="form-input border flex-grow-1 text-accent" placeholder="Search Events"/>
          <button class="form-button btn-primary rounded-l-none">Search</button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <event-control />
        <event-control />
        <event-control />
        <event-control />
        <div>
          <ul class="pagination pagination-lg float-md-right">
            <li class="page-item disabled">
              <a class="page-link" href="#">&laquo;</a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">&raquo;</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import EventControl from "../../components/EventControl";
export default {
  components: {
    EventControl
  }
};
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

.event-title {
  font-size: 18px;
}

.event-venue {
  font-size: 14px;
}

.event-date {
  font-size: 14px;
  font-weight: 700;
}
</style>
