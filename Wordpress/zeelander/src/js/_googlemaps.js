'use strict';

var	$ = require('jQuery');

var Gmaps = function() {
}

Gmaps.prototype = {

	/*
	*  render_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/

	render_map: function ( $el ) {

		var self = this;

		// var
		var $markers = $el.find('.marker');

		// vars
		var args = {
			zoom		: 15,
		    scrollwheel: false,
		    navigationControl: false,
		    mapTypeControl: false,
		    scaleControl: false,
		    draggable: false,
			center		: new window.google.maps.LatLng(0, 0),
			mapTypeId	: window.google.maps.MapTypeId.ROADMAP,
		};

		// create map
		var map = new window.google.maps.Map( $el[0], args);

		// add a markers reference
		map.markers = [];

		// add markers
		$markers.each(function(){

	    	self.add_marker( $(this), map );

		});

		// center map
		self.center_map( map );

	},

	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	add_marker: function( $marker, map ) {

		var self = this;

		// var
		var latlng = new window.google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		// create marker
		var marker = new window.google.maps.Marker({
			position	: latlng,
			map			: map
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new window.google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			window.google.maps.event.addListener(marker, 'click', function() {

				infowindow.open( map, marker );

			});
		}

	},

	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	center_map: function( map ) {

		var self = this;

		// vars
		var bounds = new window.google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new window.google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		// map.setCenter( bounds.getCenter() );
		// map.setZoom( 3 );

		//only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 15 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}
}

module.exports = new Gmaps();