$('document').ready(function() {
	$('button').click(function() {
		var div = document.getElementById("ft_list");
		var element = prompt("What do you want to add?");
		if (element !== null && element !== "") {
			div.innerHTML = firstbit + thing.length + secondbit + element + thirdbit + div.innerHTML;
			thing.unshift(element);
		}
		document.cookie = thing;
	})
});
