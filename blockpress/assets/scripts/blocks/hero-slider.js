import Swiper from 'swiper';
(function($) {
	$(function() {
		var mySwiper = new Swiper ('.swiper-container', {
			// Optional parameters
			//direction: 'vertical',
			loop: true,
			speed: 400,
			autoplay: {
				delay: 5000,
			  },
			// fadeEffect: {
			// 	crossFade: true
			//   },
			// If we need pagination
			pagination: {
			  el: '.swiper-pagination',
			},

			// Navigation arrows
			navigation: {
			  nextEl: '.swiper-button-next',
			  prevEl: '.swiper-button-prev',
			},

			// And if we need scrollbar
			scrollbar: {
			  el: '.swiper-scrollbar',
			},
		  })

	});
})(jQuery);

