$('document').ready(function() {

	var thing = $.makeArray();

	$('button').click(function() {
		var element = prompt("What do you want to add?");
		if (element !== null && element !== "") {
			$("#ft_list").prepend("<div class=\"list_elem\">" + element + "</div>");
			thing.unshift(element);
		}
		setCookie(thing);
		console.log(getCookie("sampletext="));
	})

	$('div').click(function(e) {
		if ($(e.target).hasClass('list_elem') && confirm("Remove element '" + $(e.target).text() + "'?")) {
			$(e.target).remove();
		}
	});

});
