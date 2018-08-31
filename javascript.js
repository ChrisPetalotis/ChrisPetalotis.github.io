// When clicking on a navbar link it goes to the corresponding part of the website
// Select all links with hashes


// When the user scrolls down 20px from the top of the document, show the button
window.addEventListener('scroll', scrollFunction);

function scrollFunction() {
    if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
        document.getElementById("arrow-to-top").classList.add('active');

    } else {
        document.getElementById("arrow-to-top").classList.remove('active');
    }
}

//When the user clicks on the button, scroll to the top of the document
function topFunction() {
	event.preventDefault();
	$('html, body').animate({
  		scrollTop: 0
	}, 900);
}

var x = window.matchMedia("(max-width: 600px)");

function changeTop (mediaWidth) {
    if (mediaWidth.matches && (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120)) { // If media query matches
        document.querySelectorAll('li').forEach(li => li.style.marginTop= "33px");
    } else {
        document.querySelectorAll('li').forEach(li => li.style.marginTop= "0px");
    }
}

changeTop(x); // Call listener function at run time
x.addListener(changeTop); // Attach listener function on state changes
