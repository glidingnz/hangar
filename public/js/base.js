
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
//# sourceMappingURL=base.js.map
