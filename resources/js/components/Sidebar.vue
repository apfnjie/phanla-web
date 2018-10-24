<template>
    <div class=" px-3 py-3 border">
        <ul class="list-group">
            <li class="list-group-item">
				<a href="">Cras justo odio</a>
			</li>
            <li class="list-group-item">
				<a href="">Cras justo odio</a>
			</li>
			<li class="list-group-item">
				<a href="">Cras justo odio</a>
			</li>
			<li class="list-group-item">
				<a href="">Cras justo odio</a>
			</li>
        </ul>
    </div>
</template>

<script>
export default {
  name: "Sidebar"
};
</script>

<style lang="scss" scoped>
.list-group {
  border: none;
}

.list-group-item {
  border: none;
  //   border-bottom: 1px solid grey;
}

.list-group-item a {
  border-bottom: 1px solid lightgray;
}
</style>
