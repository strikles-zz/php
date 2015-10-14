'use strict';



// Example map markup:
// 	<div class="acf-map">
// 		<div class="marker"
// 			data-lat="52.08550839999999"
// 			data-lng="5.241049800000042"
// 			data-icon="http://vinings.dev.eenvoudmedia.nl/wp-content/uploads/2014/12/marker.png"
// 			data-iconx="14"
// 			data-icony="39">
// 		</div>
// 	</div>


var settings = {
	apiKey : 'AIzaSyCHHmaEdjqqS9q5C8JsF-y46tguwq6eXrY'
};

global.initGoogleMaps = function() {
	global.google = window.google;

	$('.acf-map').each(function(){
		render_map($(this));
	});
};


$.getScript("https://maps.googleapis.com/maps/api/js?v=3.exp&key=" + settings.apiKey + "&callback=initGoogleMaps");


function render_map( $el ) {

	// var
	var $markers = $el.find('.marker');

	// vars
	var args = {
		zoom		: 13,
		center		: new global.google.maps.LatLng(0, 0),
		mapTypeId	: global.google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
	};

	// create map
	var map = new global.google.maps.Map($el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function(){
    	add_marker($(this), map);
	});

	// center map
	center_map(map);
}

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

function add_marker( $marker, map ) {

	console.log('$marker', $marker);

	// var
	var latlng = new global.google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	var the_icon  = $marker.attr('data-icon');
	var the_iconx = $marker.attr('data-iconx');
	var the_icony = $marker.attr('data-icony');
	var lat = $marker.attr('data-lat');
	var lng = $marker.attr('data-lng');
	var redirect_url = $marker.attr('data-redirecturl');
	var address = $marker.attr('data-address');

	var marker;

	// create marker
	if (the_icon)
	{
		marker = new global.google.maps.Marker({
			position	: latlng,
			map			: map,
			icon 		: {url: the_icon , anchor: new global.google.maps.Point(the_iconx,the_icony) }
		});
	}
	else
	{
		marker = new global.google.maps.Marker({
			position	: latlng,
			map			: map
		});
	}

	// add to array
	map.markers.push(marker);

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new global.google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		global.google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map, marker);
		});
	}

	console.log('lat', $marker.attr('data-lat'), 'lng', $marker.attr('data-lng'));

	global.google.maps.event.addListener(marker, 'click', function() {
		// map.setZoom(14);
		// map.setCenter(marker.getPosition());
		//window.open(redirect_url, '_blank'); // <- This is what makes it open in a new window.
		window.open('https://www.google.com/maps?q='+address, '_blank'); // <- This is what makes it open in a new window.
	});

	// global.google.maps.event.addListener(marker, 'click', function() {
	// 	// create an anchor, add to body, trigger click
	// 	var a = document.createElement('a');
	// 	a.setAttribute('href','https://www.google.nl/maps/dir//1e+Hogeweg,+3701+Zeist/@52.0855084,5.2410498,17z/data=!4m13!1m4!3m3!1s0x47c642a8006b2a1d:0x3da088239d5ff057!2s1e+Hogeweg,+3701+Zeist!3b1!4m7!1m0!1m5!1m1!1s0x47c642a8006b2a1d:0x3da088239d5ff057!2m2!1d5.2410498!2d52.0855084');
	// 	a.setAttribute('target', '_blank');
	// 	document.body.appendChild(a);
	// 	a.click();
	// });

}

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

function center_map( map ) {

	// vars
	var bounds = new global.google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new global.google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length <= 2 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 10 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );

	}

}
	// window.google = window.google || {};
	// global.google.maps = global.google.maps || {};
	// (function() {

	//   function getScript(src) {
	//     document.write('<' + 'script src="' + src + '"' +
	//                    ' type="text/javascript"><' + '/script>');
	//   }

	//   var modules = global.google.maps.modules = {};
	//   global.google.maps.__gjsload__ = function(name, text) {
	//     modules[name] = text;
	//   };

	//   global.google.maps.Load = function(apiLoad) {
	//     delete global.google.maps.Load;
	//     apiLoad([0.009999999776482582,[[["https://mts0.googleapis.com/vt?lyrs=m@279000000\u0026src=api\u0026hl=nl-NL\u0026","https://mts1.googleapis.com/vt?lyrs=m@279000000\u0026src=api\u0026hl=nl-NL\u0026"],null,null,null,null,"m@279000000",["https://mts0.google.com/vt?lyrs=m@279000000\u0026src=api\u0026hl=nl-NL\u0026","https://mts1.google.com/vt?lyrs=m@279000000\u0026src=api\u0026hl=nl-NL\u0026"]],[["https://khms0.googleapis.com/kh?v=160\u0026hl=nl-NL\u0026","https://khms1.googleapis.com/kh?v=160\u0026hl=nl-NL\u0026"],null,null,null,1,"160",["https://khms0.google.com/kh?v=160\u0026hl=nl-NL\u0026","https://khms1.google.com/kh?v=160\u0026hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/vt?lyrs=h@279000000\u0026src=api\u0026hl=nl-NL\u0026","https://mts1.googleapis.com/vt?lyrs=h@279000000\u0026src=api\u0026hl=nl-NL\u0026"],null,null,null,null,"h@279000000",["https://mts0.google.com/vt?lyrs=h@279000000\u0026src=api\u0026hl=nl-NL\u0026","https://mts1.google.com/vt?lyrs=h@279000000\u0026src=api\u0026hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/vt?lyrs=t@132,r@279000000\u0026src=api\u0026hl=nl-NL\u0026","https://mts1.googleapis.com/vt?lyrs=t@132,r@279000000\u0026src=api\u0026hl=nl-NL\u0026"],null,null,null,null,"t@132,r@279000000",["https://mts0.google.com/vt?lyrs=t@132,r@279000000\u0026src=api\u0026hl=nl-NL\u0026","https://mts1.google.com/vt?lyrs=t@132,r@279000000\u0026src=api\u0026hl=nl-NL\u0026"]],null,null,[["https://cbks0.googleapis.com/cbk?","https://cbks1.googleapis.com/cbk?"]],[["https://khms0.googleapis.com/kh?v=84\u0026hl=nl-NL\u0026","https://khms1.googleapis.com/kh?v=84\u0026hl=nl-NL\u0026"],null,null,null,null,"84",["https://khms0.google.com/kh?v=84\u0026hl=nl-NL\u0026","https://khms1.google.com/kh?v=84\u0026hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/mapslt?hl=nl-NL\u0026","https://mts1.googleapis.com/mapslt?hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/mapslt/ft?hl=nl-NL\u0026","https://mts1.googleapis.com/mapslt/ft?hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/vt?hl=nl-NL\u0026","https://mts1.googleapis.com/vt?hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/mapslt/loom?hl=nl-NL\u0026","https://mts1.googleapis.com/mapslt/loom?hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/mapslt?hl=nl-NL\u0026","https://mts1.googleapis.com/mapslt?hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/mapslt/ft?hl=nl-NL\u0026","https://mts1.googleapis.com/mapslt/ft?hl=nl-NL\u0026"]],[["https://mts0.googleapis.com/mapslt/loom?hl=nl-NL\u0026","https://mts1.googleapis.com/mapslt/loom?hl=nl-NL\u0026"]]],["nl-NL","US",null,0,null,null,"https://maps.gstatic.com/mapfiles/","https://csi.gstatic.com","https://maps.googleapis.com","https://maps.googleapis.com",null,"https://maps.google.com"],["https://maps.gstatic.com/maps-api-v3/api/js/18/14/intl/nl_ALL","3.18.14"],[489134250],1,null,null,null,null,null,"",null,null,1,"https://khms.googleapis.com/mz?v=160\u0026",null,"https://earthbuilder.googleapis.com","https://earthbuilder.googleapis.com",null,"https://mts.googleapis.com/vt/icon",[["https://mts0.googleapis.com/vt","https://mts1.googleapis.com/vt"],["https://mts0.googleapis.com/vt","https://mts1.googleapis.com/vt"],[null,[[0,"m",279000000]],[null,"nl-NL","US",null,18,null,null,null,null,null,null,[[47],[37,[["smartmaps"]]]]],0],[null,[[0,"m",279000000]],[null,"nl-NL","US",null,18,null,null,null,null,null,null,[[47],[37,[["smartmaps"]]]]],3],[null,[[0,"m",279000000]],[null,"nl-NL","US",null,18,null,null,null,null,null,null,[[50],[37,[["smartmaps"]]]]],0],[null,[[0,"m",279000000]],[null,"nl-NL","US",null,18,null,null,null,null,null,null,[[50],[37,[["smartmaps"]]]]],3],[null,[[4,"t",132],[0,"r",132000000]],[null,"nl-NL","US",null,18,null,null,null,null,null,null,[[63],[37,[["smartmaps"]]]]],0],[null,[[4,"t",132],[0,"r",132000000]],[null,"nl-NL","US",null,18,null,null,null,null,null,null,[[63],[37,[["smartmaps"]]]]],3],[null,null,[null,"nl-NL","US",null,18],0],[null,null,[null,"nl-NL","US",null,18],3],[null,null,[null,"nl-NL","US",null,18],6],[null,null,[null,"nl-NL","US",null,18],0],["https://mts0.google.com/vt","https://mts1.google.com/vt"],"/maps/vt",279000000,132],2,500,["https://geo0.ggpht.com/cbk","https://g0.gstatic.com/landmark/tour","https://g0.gstatic.com/landmark/config","","https://www.google.com/maps/preview/log204","","https://static.panoramio.com.storage.googleapis.com/photos/"],["https://www.google.com/maps/api/js/master?pb=!1m2!1u18!2s14!2snl-NL!3sUS!4s18/14/intl/nl_ALL","https://www.google.com/maps/api/js/widget?pb=!1m2!1u18!2s14!2snl-NL"],1,0], loadScriptTime);
	//   };
	//   var loadScriptTime = (new Date).getTime();
	//   getScript("https://maps.gstatic.com/maps-api-v3/api/js/18/14/intl/nl_ALL/main.js");
	// })();

	// (function($) {

	// /*
	// *  render_map
	// *
	// *  This function will render a Google Map onto the selected jQuery element
	// *
	// *  @type	function
	// *  @date	8/11/2013
	// *  @since	4.3.0
	// *
	// *  @param	$el (jQuery element)
	// *  @return	n/a
	// */

	// function render_map( $el ) {

	// 	// var
	// 	var $markers = $el.find('.marker');

	// 	// vars
	// 	var args = {
	// 		zoom		: 16,
	// 		center		: new global.google.maps.LatLng(0, 0),
	// 		mapTypeId	: global.google.maps.MapTypeId.ROADMAP,
	// 		scrollwheel: false,
	// 	};

	// 	// create map
	// 	var map = new global.google.maps.Map( $el[0], args);

	// 	// add a markers reference
	// 	map.markers = [];

	// 	// add markers
	// 	$markers.each(function(){

	//     	add_marker( $(this), map );

	// 	});

	// 	// center map
	// 	center_map( map );

	// }

	// /*
	// *  add_marker
	// *
	// *  This function will add a marker to the selected Google Map
	// *
	// *  @type	function
	// *  @date	8/11/2013
	// *  @since	4.3.0
	// *
	// *  @param	$marker (jQuery element)
	// *  @param	map (Google Map object)
	// *  @return	n/a
	// */

	// function add_marker( $marker, map ) {

	// 	// var
	// 	var latlng = new global.google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	// 	var the_icon = $marker.attr('data-icon');
	// 	var the_iconx = $marker.attr('data-iconx');
	// 	var the_icony = $marker.attr('data-icony');
	// 	// create marker
	// 	if (the_icon) {
	// 		var marker = new global.google.maps.Marker({
	// 			position	: latlng,
	// 			map			: map,
	// 			icon 		: {url: the_icon , anchor: new global.google.maps.Point(the_iconx,the_icony) }
	// 		});
	// 	}
	// 	else {
	// 		var marker = new global.google.maps.Marker({
	// 			position	: latlng,
	// 			map			: map
	// 		});
	// 	}

	// 	// add to array
	// 	map.markers.push( marker );

	// 	// if marker contains HTML, add it to an infoWindow
	// 	if( $marker.html() )
	// 	{
	// 		// create info window
	// 		var infowindow = new global.google.maps.InfoWindow({
	// 			content		: $marker.html()
	// 		});

	// 		// show info window when marker is clicked
	// 		google.maps.event.addListener(marker, 'click', function() {

	// 			infowindow.open( map, marker );

	// 		});

	// 	}
	// 	google.maps.event.addListener(marker, 'click', function() {
	// 		// create an anchor, add to body, trigger click
	// 		var a = document.createElement('a');
	// 		a.setAttribute('href','https://www.google.nl/maps/dir//Davids+Advocaten+B.V.,+De+Ruyterkade+142,+1011+AC+Amsterdam/@52.3398955,4.9167034,11z/data=!4m12!1m3!3m2!1s0x47c609b072a85a81:0x5685549b15bab81c!2sDavids+Advocaten+B.V.!4m7!1m0!1m5!1m1!1s0x47c609b072a85a81:0x5685549b15bab81c!2m2!1d4.908072!2d52.377508');
	// 		a.setAttribute('target', '_blank');
	// 		document.body.appendChild(a);
	// 		a.click();
	// 	});

	// }

	// /*
	// *  center_map
	// *
	// *  This function will center the map, showing all markers attached to this map
	// *
	// *  @type	function
	// *  @date	8/11/2013
	// *  @since	4.3.0
	// *
	// *  @param	map (Google Map object)
	// *  @return	n/a
	// */

	// function center_map( map ) {

	// 	// vars
	// 	var bounds = new global.google.maps.LatLngBounds();

	// 	// loop through all markers and create bounds
	// 	$.each( map.markers, function( i, marker ){

	// 		var latlng = new global.google.maps.LatLng( marker.position.lat(), marker.position.lng() );

	// 		bounds.extend( latlng );

	// 	});

	// 	// only 1 marker?
	// 	if( map.markers.length == 2 )
	// 	{
	// 		// set center of map
	// 	    map.setCenter( bounds.getCenter() );
	// 	    map.setZoom( 10 );
	// 	}
	// 	else
	// 	{
	// 		// fit to bounds
	// 		map.fitBounds( bounds );

	// 	}

	// }

	// /*
	// *  document ready
	// *
	// *  This function will render each map when the document is ready (page has loaded)
	// *
	// *  @type	function
	// *  @date	8/11/2013
	// *  @since	5.0.0
	// *
	// *  @param	n/a
	// *  @return	n/a
	// */

	// $(document).ready(function(){

	// 	$('.acf-map').each(function(){

	// 		render_map( $(this) );

	// 	});

	// });

	// })(jQuery);
