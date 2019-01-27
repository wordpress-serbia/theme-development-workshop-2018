'use strict';

var $ = window.jQuery;

$(document).ready(function() {

	$("#slider").roundSlider({
		radius: 80,
		circleShape: radionica2.roundslider.circleShape,
		sliderType: "min-range",
		showTooltip: radionica2.roundslider.showTooltip,
		value: radionica2.roundslider.tooltipValue,
		startAngle: 315
	});

}); //end of document ready