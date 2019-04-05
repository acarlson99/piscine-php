function	thing() {
	console.log("wow boy howdy js is amazing huh gee wiz what a doggone treat this is huh fellas im really enjoying myself doing what here im doing this java scipt stuff huh golly gee this is some neato stuff eh lads");
}

var thing = new Array();
if (document.cookie) {
	thing = getCookie();
	console.log(thing);
	ohgodthisisgrossupdateeverythingwhyohgodwhy();
}
else {
	setCookie();
}
var firstbit = "<div onclick=\"removeElement("
var secondbit = ")\">";
var thirdbit = "</div>";

function	getCookie() {
	// var b = document.cookie.split(',');
	// console.log(b);
	// // b.map(x => atob(x));
	// for (n in b) {
	// 	console.log("atob on", b[n]);
	// 	b[n] = atob(b[n]);
	// }
	// return (b);
	return (document.cookie.split(','));
}

function	setCookie() {
	// var b = thing.map(x => btoa(x));
	// console.log(b);
	// document.cookie = b;
	// console.log("Cookie is", document.cookie);
	// console.log("Would return", getCookie());
	// return ;
	document.cookie = thing;
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
	setCookie();
}

function	getElement() {
	var div = document.getElementById("ft_list");
	var element = prompt("What do you want to add?");
	if (element !== null && element !== "") {
		div.innerHTML = firstbit + thing.length + secondbit + element + thirdbit + div.innerHTML;
		thing.unshift(element);
	}
	setCookie();
}
