'use strict';

var Resizer = function() {

};

Resizer.prototype = {

	resizeColorBoxes: function() {
		if ($('#colorbox').length) {
			$.colorbox.resize({width:"90%", height:"90%"});
		}
	}
};

module.exports = new Resizer();