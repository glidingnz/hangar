(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var OrgsComponent = Vue.extend({
	template: '<div class="list-group"><a class="list-group-item" v-for="org in orgs" href="http://{{org.slug}}.gliding.dev">{{org.name}}</a></div>',
	data: function data() {
		return {
			orgs: []
		};
	},
	created: function created() {
		this.loadOrgs();
	},
	methods: {
		loadOrgs: function loadOrgs() {
			this.$http.get('/api/v1/orgs').then(function (response) {
				// success callback
				this.orgs = response.data.data;
			});
		}
	}
});

// register
Vue.component('orgs-component', OrgsComponent);

new Vue({
	el: '#test'
});

},{}]},{},[1]);

//# sourceMappingURL=home.js.map
