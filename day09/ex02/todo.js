function	thing() {
	console.log("wow boy howdy js is amazing huh gee wiz what a doggone treat this is huh fellas im really enjoying myself doing what here im doing this java scipt stuff huh golly gee this is some neato stuff eh lads");
}

var thing = new Array();
if (document.cookie) {
	thing = document.cookie.split(',');
	ohgodthisisgrossupdateeverythingwhyohgodwhy();
}
else {
	document.cookie = thing;
}
var firstbit = "<div onclick=\"removeElement("
var secondbit = ")\">";
var thirdbit = "</div>";

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
	document.cookie = thing;
}

function	getElement() {
	var div = document.getElementById("ft_list");
	var element = prompt("What do you want to add?");
	if (element !== null && element !== "") {
		div.innerHTML = firstbit + thing.length + secondbit + element + thirdbit + div.innerHTML;
		thing.unshift(element);
	}
	document.cookie = thing;
}
