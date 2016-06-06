var OrgsComponent = Vue.extend({
	template: '<ul><li v-for="org in orgs"><a href="http://{{org.slug}}.gliding.dev">{{org.name}}</li></ul>',
	data: function() {
		return {
			orgs: []
		}
	},
	created: function () {
		this.loadOrgs();
	},
	methods: {
		loadOrgs: function() {
			this.$http.get('/api/v1/orgs').then(function (response) {
				// success callback
				this.orgs = response.data.data;
			});
		}
	}
})

// register
Vue.component('orgs-component', OrgsComponent); 

new Vue({
	el: '#test'
})

