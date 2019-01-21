/**
 * File main.js.
 *
 * Theme's custom functions.
 */

var toTopBtn = document.getElementById('back-to-top');
var scroll = new SmoothScroll('a[href*="#"]');

/**
 * Scroll event.
 */
window.onscroll = function() {
	showToTopButton();
}

/**
 * Scroll event callback to display/hide back-to-top button.
 */
function showToTopButton() {
	if (document.body.scrollTop > 500 ||
		document.documentElement.scrollTop > 500) {
		toTopBtn.classList.add('shown');

	} else {
		toTopBtn.classList.remove('shown');
	}
}
