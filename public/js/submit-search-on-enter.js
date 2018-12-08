var input = document.getElementById("searchString");
input.addEventListener("keyup", function(event) {
	event.preventDefault();
	if (event.keyCode === 13) {
	    document.getElementById("searchBtn").click();
	}
});