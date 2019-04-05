$('document').ready(function() {
	var thing = $.makeArray();

	$('button').click(function() {
		var element = prompt("What do you want to add?");
		if (element !== null && element !== "") {
			$("#ft_list").prepend("<div class=\"list_elem\">" + element + "</div>");
			thing.unshift(element);
		}
		document.cookie = thing;
	})

	$('div').click(function(e) {
		if ($(e.target).hasClass('list_elem')) {
		console.log("Killing thing");	// TODO: what why does this not work who designed this software anyway
		$(e.target).remove();
		}
	});

	function	ohgodthisisgrossupdateeverythingwhyohgodwhy() {
		var firstbit = "<div onclick=\"removeElement("
		var secondbit = ")\">";
		var thirdbit = "</div>";
		var div = document.getElementById("ft_list");
		var i = 0;
		div.innerHTML = '';
		for (n in thing) {
			div.innerHTML = firstbit + i + secondbit + thing[thing.length - n - 1] + thirdbit + div.innerHTML;
			++i;
		}
		document.cookie = thing;
	}
});
