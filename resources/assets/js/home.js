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

/*
gnz.messages = new Vue({
	el: '#app-layout',
	components: { Messages },
	created: function() {
		
	},
	methods: {
	}
});

if (typeof messages != 'undefined') {
	//gnz.messages;
	messages.forEach(function(message) {
		switch (message.type) {
			case 'success': gnz.messages.success(message.text); break;
			case 'error': gnz.messages.error(message.text); break;
			case 'note': gnz.messages.note(message.text); break;
			case 'warning': gnz.messages.warning(message.text); break;
		}
	})
	console.log(messages);
}

*/