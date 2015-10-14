'use strict';
var $ = jQuery;
var twitter_id="Oud_Valkeveen";
var url="www.oudvalkeveen.nl/twitter/";
var tweet=$(".twitter").children("blockquote");
$(tweet).text("Loading latest Tweet...");
$.getJSON(url,function(c){
	var b=$(c).get(0),a=b.text,d=$(b.entities.urls);
	if(d.size()){
		d.each(function(){
			a=a.replace(this.url,'<a href="'+this.url+'" target="_blank">'+this.url+"</a>");
		}
		);
	}
	$(tweet).html(a);
	$(tweet).siblings(".timestamp").removeClass("hidden").text(relative_time(c[0].created_at));
}
);
function relative_time(c){
	var b=c.split(" ");
	c=b[1]+" "+b[2]+", "+b[5]+" "+b[3];
	var a=Date.parse(c);
	var e=(arguments.length>1)?arguments[1]:new Date();
	var f=parseInt((e.getTime()-a)/1000);
	f=f+(e.getTimezoneOffset()*60);
	var d="";
	if(f<60){
		d="a minute ago";
	}
	else{
		if(f<120){
			d="couple of minutes ago";
		}
		else{
			if(f<(45*60)){
				d=(parseInt(f/60)).toString()+" minutes ago";
			}
			else{
				if(f<(90*60)){
					d="an hour ago";
				}
				else{
					if(f<(24*60*60)){
						d=""+(parseInt(f/3600)).toString()+" hours ago";
					}
					else{
						if(f<(48*60*60)){
							d="1 day ago";
						}
						else{
							d=(parseInt(f/86400)).toString()+" days ago";
						}

					}

				}

			}

		}

	}
	return d;
};


