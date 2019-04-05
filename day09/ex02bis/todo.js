$('document').ready(function() {
	function	getCookie(name) {
		var b = decodeURIComponent(document.cookie);
		var ca = b.split(';');
		for (i in ca) {
			var c = ca[i];
			if (c.indexOf(name) == 0)
				return (c.substring(name.length, c.length).split(',').map(x => atob(x)));
		}
		return (new Array());
	}

	function	setCookie(cookme) {
		var b = cookme.map(x => btoa(x));
		b = "sampletext=" + b + ";";
		document.cookie = b;
	}

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
