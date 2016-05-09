
<template>
	<div id="messages">
		<div class="messages">
			<div v-for="message in messages" class="message message-{{message.type}}">
				<i class="fa fa-times" style="float:right;" v-on:click="closeAll()"></i><i class="fa" v-bind:class="{'fa-minus-circle':message.type=='error', 'fa-exclamation-triangle':message.type=='warning', 'fa-check-circle':message.type=='success', 'fa-info-circle':message.type=='note'}"></i> {{message.message}}
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data: function() {
		return {
			messages: [],
			messageCount: 0
		}
	},
	methods: {
		error: function(text) {
			this.messages.push({type:'error', message: text});
		},
		success: function(text) {
			this.messages.push({type:'success', message: text});
		},
		warning: function(text) {
			this.messages.push({type:'warning', message: text});
		},
		note: function(text) {
			this.messages.push({type:'note', message: text});
		},
		close: function(message) {
			var index = this.messages.indexOf(message);
			if (index > -1) {
				this.messages.splice(index, 1);
			}
		},
		closeAll: function() {
			this.messages=[];
		}
	}
}
</script>

<style>
.messages {
	padding: 0 15px;
}
.message {
	padding: 10px;
	margin: 20px 0;
	border-radius: 4px;
	text-align: center;
	color: #FFF;
}
.message a {
	color: #FFF;
}

.message-error {
	background-color: #A00;
}
.message-warning {
	background-color: #DC9200;
}
.message-success {
	background-color: #0A0;
}
.message-note {
	background-color: #3C8DBC;
}

.error {
	color: #A00;
}
.warning {
	color: #DC9200;
}
.success {
	color: #0A0;
}
.note {
	color: #3C8DBC;
}
</style>