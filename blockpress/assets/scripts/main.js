import filterpost_filter from "./blocks/bp-filter-post.js"; 
import faq from "./blocks/bp-faq.js";
//import picturefill from "picturefill";
import cookie from "./cookie.js";
import lazyload from "lazysizes";
import mode from "./mode.js"

//import css_grid_poly from  './css-polyfills.min';
import AOS from "aos";

window.app = {
	init : function (){
		console.log(1111);
		AOS.init();
	}
};


(function ($) {
	$(function () {
		$(document).on("click", ".button__navigation", function (e) {
			$(".nav-icon").toggleClass("open");
			$(".header__navigation").toggleClass("open");
        });
		app.init();
		
	});
})(jQuery);

document.addEventListener("lazybeforeunveil", function (e) {
	var bg = e.target.getAttribute("data-bg");
	if (bg) {
		e.target.style.backgroundImage = "url(" + bg + ")";
	}
});
