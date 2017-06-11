// JavaScript Document
function mover() {
	$("td").click(function(){
//		$(this).hide();
		var currItem = $(this);
//		alert("You added the " + currItem + " to your cart!");
		var textno = document.createTextNode(currItem);
		document.getElementById("pistol").appendChild(textno);
	});
}
