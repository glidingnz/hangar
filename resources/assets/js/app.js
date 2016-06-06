var gnz = {};

global.Vue = require('vue');
//import Vue from 'vue';
import Messages from './messages.vue';

gnz.messages = new Vue({
	el: '#messages',
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
	messages.forEach(function(message) {
		switch (message.type) {
			case 'success': gnz.messages.success(message.text); break;
			case 'error': gnz.messages.error(message.text); break;
			case 'note': gnz.messages.note(message.text); break;
			case 'warning': gnz.messages.warning(message.text); break;
		}
	})
}

// Common Methods 

var History = window.History;

function get_url_param(val) {
	var result = "",
	tmp = [];
	location.search.substr(1).split("&").forEach(function (item) {
		tmp = item.split("=");
		if (tmp[0] === val) result = decodeURIComponent(tmp[1]);
	});
	return result;
}