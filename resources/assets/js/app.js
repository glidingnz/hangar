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
		},
		'warning': function(msg) {
			return this.$children[0].warning(msg);
		},
		'note': function(msg) {
			return this.$children[0].note(msg);
		}
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


//vm.messages().success('test');

/*
import Vue from 'vue';

new Vue({
  el: '#app',
  components: { Profile }
});
*/