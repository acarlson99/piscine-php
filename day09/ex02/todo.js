function	boyilovejs() {
	console.log("wow boy howdy js is amazing huh gee wiz what a doggone treat this is huh fellas im really enjoying myself doing what here im doing this java scipt stuff huh golly gee this is some neato stuff eh lads");
}

var thing = new Array();
if (document.cookie) {
	thing = getCookie("sampletext=");
	ohgodthisisgrossupdateeverythingwhyohgodwhy();
}
else {
	setCookie(thing);
}
var firstbit = "<div onclick=\"removeElement("
var secondbit = ")\">";
var thirdbit = "</div>";

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

function	removeElement(b) {
	if (confirm("Remove element '" + thing[thing.length - b - 1] + "' from list?")) {
		thing.splice(thing.length - b - 1, 1);
		ohgodthisisgrossupdateeverythingwhyohgodwhy();
	}
}

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
	setCookie(thing);
}

function	getElement() {
	var div = document.getElementById("ft_list");
	var element = prompt("What do you want to add?");
	if (element !== null && element !== "") {
		div.innerHTML = firstbit + thing.length + secondbit + element + thirdbit + div.innerHTML;
		thing.unshift(element);
	}
	setCookie(thing);
}
