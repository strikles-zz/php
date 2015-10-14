'use strict';

var Edebug = function() {

};

Edebug.prototype =  {

	var_dump: function(obj, indentSpaces) {

		var self = this;

	    switch (typeof obj) {
	        case "object":
	            console.log(self.indent(indentSpaces) + typeof obj + ":");
	            indentSpaces += 2; // indent further as we are entering the objects properties
	            for (var i in obj) {

	            	if(obj.hasOwnProperty(i)) {
		                console.log(self.indent(indentSpaces) + i + ":");
		                self.var_dump(obj[i], indentSpaces + 1);
		            }
	            }
	            break;
	        default: // things that are not objects, primatives... etc...
	            console.log(self.indent(indentSpaces) + typeof obj + ":" + obj);
	            break;
	    }
	},

	// just for styling with indents
	indent: function(spaces)
	{
	    var i = 0;
	    var rtr = "";
	    while(i <= (spaces * 2)) {
	        rtr += " ";
	        i++;
	    }
	    return rtr;
	}

};

module.exports = new Edebug();
