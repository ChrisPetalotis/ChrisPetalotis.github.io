$(window).ready(function () {
	window.addEventListener('scroll', scrollFunction);
});


function scrollFunction() {
		// When the user scrolls down 450px from the top of the document, show the scroll-to-top-button
	if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450)
		document.getElementById("arrow-to-top").classList.add('active');
	else 
		document.getElementById("arrow-to-top").classList.remove('active');
	console.log('scroll');
	
	$(".arrowDown").css("opacity", 1 - $(window).scrollTop() / 100);
}
// When the user clicks on the arrow button, scroll to the top of the document
function topFunction() {
	event.preventDefault();
	$('html, body').animate({
  		scrollTop: 0
	}, 900);
}