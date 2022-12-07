var captcha;
function generate() {

	// Clear old input
	document.getElementById("submit").value = "";

	captcha = document.getElementById("image");
	var uniquechar = "";

	const randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	
	for (let i = 1; i < 5; i++) {
		uniquechar += randomchar.charAt(
			Math.random() * randomchar.length)
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

function printmsg() {
	const usr_input = document
		.getElementById("submit").value;
	
	
	if (usr_input == captcha.innerHTML) {
		var s = document.getElementById("key")
			.innerHTML = "Captcha Correcto";
		generate();
        document.getElementById("botonIngresar").disabled = false;
	}
	else {
		var s = document.getElementById("key")
			.innerHTML = "Captcha Incorrecto";
		generate();
	}
}
