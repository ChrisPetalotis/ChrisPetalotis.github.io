// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
	// On-page links - Links that navigate to the same page and do not lead to other page
    if (
    	location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      	&&
      	location.hostname == this.hostname
    	) {
      		// Figure out element to scroll to
      		var target = $(this.hash);

	      	target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      	// Does a scroll target exist?
	      	if (target.length) {
	        	// Only prevent default if animation is actually gonna happen
	        	event.preventDefault();
	        	$('html, body').animate({
	          	scrollTop: target.offset().top
	        	}, 1000, function() {
	          	// Callback after animation
	          	// Must change focus!
	          	var $target = $(target);
	          	$target.focus();
	          	if ($target.is(":focus")) { // Checking if the target was focused
	            	return false;
	          	} else {
	            	$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            	$target.focus(); // Set focus again
	          	};
	        	});
	    	}
   		}
  });

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    const header = document.querySelector('header');
    const ul  = document.querySelector('ul');
    
    if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
        document.getElementById("arrow-to-top").style.display = "block";
        ul.style.marginTop = '7px';
        document.getElementById('name').style.top = '20px';
        header.style.height = '60px';
        ul.style.lineHeight = '0px';
        header.style.background = '#222222';
    } else {
        ul.style.marginTop = '0px';
        document.getElementById('name').style.top = '29px';
        document.querySelector('ul').style.lineHeight = 'initial';
        header.style.background = 'linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2))';
        header.style.height = '80px';
        document.getElementById("arrow-to-top").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	event.preventDefault();
	$('html, body').animate({
  		scrollTop: 0
	}, 1000);
}

var x = window.matchMedia("(max-width: 600px)");

function changeTop (x) {
    if (x.matches && (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120)) { // If media query matches
        document.querySelectorAll('li').forEach(li => li.style.marginTop= "33px");
    } else {
        document.querySelectorAll('li').forEach(li => li.style.marginTop= "0px");
    }
}

changeTop(x); // Call listener function at run time
x.addListener(changeTop); // Attach listener function on state changes
