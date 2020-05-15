(function($) { 
	$(function() {
		var onlyUrl = window.location.href.replace(window.location.search,'');
		var filters = $(".filters");
		var data_filter = $(".data-filter");
		var cases = $(".filtred-post");
		$(document)
		.on("click", ".show-cat", function(e) {
			$(".filter-cat").toggleClass("open");
			$(this).addClass("active-filter");
		})
		.on("click", ".showall", function(e) {
				filters.removeClass("open");
				cases.show();
				$(".filters > *").removeClass("open");
				$(".filter-val").text("");
				data_filter.removeClass("active");
				window.history.replaceState(
					"",
					"",
					onlyUrl
				);
			})
		.on("click", ".data-filter", function(e) {
			$(".filter-val").text(" +");
			var that = $(this);
			$(".active-filter .filter-val").text(": " + that.text());
			$(".filters > *").removeClass("open");

			window.history.replaceState(
				"",
				"",
				updateURLParameter(
					onlyUrl,
					"c",
					that.data("value").substring(1)
				)
			);
			var value = that.data("value");
			data_filter.removeClass("active");
			that.addClass("active");
			var $el = $(value)
				.fadeIn(350)
				.addClass("visibale");
			cases
				.not(value)
				.hide()
				.removeClass("visibale");
			$(".showall").show();
			filters.removeClass("open");
				
		});
		//URL Filter
		if (
			$(".layout--filter").length &&
			getUrlParameter("c") !== undefined &&
			getUrlParameter("c") !== ""
		) {
			
			var category = getUrlParameter("c");
			$(".show-cat .filter-val ").text(": " + category.charAt(0).toUpperCase()+ category.slice(1));
			url_filter(category);
		}
		function url_filter(category){

			 var $el = $("." + category)
				.fadeIn(350)
				.addClass("visibale");
			cases
				.not("." + category)
				.hide()
				.removeClass("visibale");
			$(".showall").show();
			filters.removeClass("open");

		}
	});
})(jQuery);

function updateURLParameter(url, param, paramVal) {
	var newAdditionalURL = "";
	var tempArray = url.split("?");
	var baseURL = tempArray[0];
	var additionalURL = tempArray[1];
	var temp = "";
	if (additionalURL) {
		tempArray = additionalURL.split("&");
		for (var i = 0; i < tempArray.length; i++) {
			if (tempArray[i].split("=")[0] != param) {
				newAdditionalURL += temp + tempArray[i];
				temp = "&";
			}
		}
	}

	var rows_txt = temp + "" + param + "=" + paramVal;
	return baseURL + "?" + newAdditionalURL + rows_txt;
}
var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		sURLVariables = sPageURL.split("&"),
		sParameterName,
		i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split("=");

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : sParameterName[1];
		}
	}
};
