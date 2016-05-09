var gnz = {};

import Vue from 'vue';
import Messages from './messages.vue';

gnz.messages = new Vue({
	el: '#app',
	components: { Messages },
	created: function() {
		
	},
	methods: {
		'success': function(msg) {
			return this.$children[0].success(msg);
		},
		'error': function(msg) {
			return this.$children[0].error(msg);
		}
	}
});

gnz.messages.success('testarooni');

//vm.messages().success('test');

/*
import Vue from 'vue';

new Vue({
  el: '#app',
  components: { Profile }
});
*/