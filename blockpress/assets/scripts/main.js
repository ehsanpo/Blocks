import heroslider from "./blocks/hero-slider.js";
import filterpost_filter from "./blocks/bp-filter-post.js";
import faq from "./blocks/bp-faq.js";
//import picturefill from "picturefill";
import cookie from "./cookie.js";
import lazyload from "lazysizes";
import mode from "./mode.js"

import AOS from "aos";

window.app = {
	init : function (){
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
