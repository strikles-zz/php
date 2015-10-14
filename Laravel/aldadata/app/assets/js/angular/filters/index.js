window.angular.module('promotersApp').filter('reverse', function() {

	'use strict';
	
    return function(items) {
        return (items && items.length > 0 ? items.slice().reverse() : items);
    };
});