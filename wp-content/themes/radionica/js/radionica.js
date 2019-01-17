'use strict';

var $ = window.jQuery;

$(document).ready(function() {

	$("#slider").roundSlider({
		radius: 80,
		circleShape: "pie",
		sliderType: "min-range",
		showTooltip: true,
		value: 50,
		startAngle: 315
	});

}); //end of document ready