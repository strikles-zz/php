'use strict';
var $ = jQuery;
var woe_id="731840";
var widget=$(".weather .forecast");
var query='select * from weather.forecast where woeid=731840 and u="c"';
$.getJSON("http://query.yahooapis.com/v1/public/yql?callback=?",{q:query,format:"json"},function(c){
	var d=c.query.results.channel;
	var b="<img[^<>]*/>";
	var a=(d.item.description.match(b));
	$("<span/>",{"class":"high",text:d.item.forecast[0].high+"\u00B0"}).appendTo($(widget));
	$(widget).append(a[0])
});



var cloud = $(".weather"),ease={queue:true,duration:2000,easing:"easeInOutCubic"},cloudAnimation=function(){
	cloud.animate({right:"-=25px",top:"-=10px"},ease)
	.animate({right:"+=25px",top:"+=10px"},ease)
	.animate({right:"+=25px",top:"-=10px"},ease)
	.animate({right:"-=25px",top:"+=10px"},ease)
	.delay(1000);
	setTimeout("cloudAnimation()",10000)
};