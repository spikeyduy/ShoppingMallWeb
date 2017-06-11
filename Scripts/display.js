"use strict";
function showAll() {
	// $(".Handguns").css("visibility","visible");
	$(".Handguns").show();
	$(".AssaultRifles").show();
	$(".Shotguns").show();
}
function hideHand() {
	$(".Handguns").show();
	$(".AssaultRifles").hide();
	$(".Shotguns").hide();
}
function hideAssaultRifles() {
	$(".Handguns").hide();
	$(".AssaultRifles").show();
	$(".Shotguns").hide();
}
function hideShotguns() {
	$(".Handguns").hide();
	$(".AssaultRifles").hide();
	$(".Shotguns").show();
}
