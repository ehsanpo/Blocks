//import featherlight from './lib/featherlight.js';
import picturefill from 'picturefill';
import cookie from './cookie.js';
import lazyload from 'lazysizes';
import css_grid_poly from  './css-polyfills.min';

(function($) { 
	$(function() {
		$(document)
        .on('click','.button__navigation',function(e){
        	$('.nav-icon').toggleClass('open');
        	$('.header__navigation').toggleClass('open');

        });
	});
})(jQuery);

document.addEventListener('lazybeforeunveil', function(e){
	var bg = e.target.getAttribute('data-bg');
	if(bg){
	e.target.style.backgroundImage = 'url(' + bg + ')';
	}
});
