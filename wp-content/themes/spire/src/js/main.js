/////     BOOTSTRAP    /////
module.exports = function () {
	//jQuery is loaded by Wordpress, so it will already be present
	window.$ = window.jQuery;

	/*
	If a global data store is needed (usually for a framework):
    	window.store = window.store || {};
	*/

	/*
	Including frameworks:
	Add reference(s) to the devDependencies section of the package.json file
	Run npm install
	Require them globally here, for example:
		window._ = require('underscore');
	*/

	/*
	Vue comes pre-installed in the package.json file.
	You could also use the same setup for Angular, Backbone, etc.
	If you need Vue and its components:
		var Vue = require('vue'),
			VueResource = require('vue-resource'),
			VueRouter = require('vue-router');
	*/

	/*
	Modular code:
	Write JS in modules and include them here.
	Please do not write your JS in this file, only reference it. The compiler will do the rest.
	Wrap referenced module code in conditionals, something like this pseudo-code for a slideshow module:
		if ( $('.class-of-slideshow-container').length ) {
			var Slideshow = require(./global/name_of_slideshow_js_file);
			var slideshow = new Slideshow();
			slideshow.init({...});
		}
	*/
}();
