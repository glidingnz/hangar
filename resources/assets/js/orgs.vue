
<template>
	<ul class="orgs" id="orgs">
		<li v-for="org in orgs"><h2>{{org.name}}</h2></li>
	</ul>
</template>

<script>
export default {
	data: function() {
		return {
			clubs: []
		}
	},
	created: function () {
		this.loadClubs();
	},
	methods: {
		loadClubs: function() {
			this.$http.get('/api/v1/clubs').then(function (response) {
				// success callback
				this.clubs = response.data;
			});
		}
	}
}
</script>

<style>
</style>