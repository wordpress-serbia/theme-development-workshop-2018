'use strict';

var $ = window.jQuery;

$(document).ready(function() {

	if ( $(".slider").length ) {
		$('.slider').slick();
	}

	if ( $("#slider").length ) {
		$("#slider").roundSlider({
			radius: 80,
			circleShape: radionica2.roundslider.circleShape,
			sliderType: "min-range",
			showTooltip: radionica2.roundslider.showTooltip,
			value: radionica2.roundslider.tooltipValue,
			startAngle: 315
		});
	}

}); //end of document ready
