$(document).ready(function () {

	// Assign event listeners
	$(window).scroll(() => showArrowToTop());
	$('#arrow-to-top').click((event) => scrollToTop(event));
	$('.nav-item>a').click(function(event) {
		const targetSection = $(this).attr("href");
		if (!targetSection.includes('html')) {
			event.preventDefault();
			const marginTop = parseInt($(targetSection).css('margin-top'), 10)
			$('html, body').animate({ scrollTop: $(targetSection).offset().top - marginTop}, 750);
		}
	});

	let previousPosition;
	previousPosition = randomGreetings(previousPosition);
});

const randomGreetings = async (previousPosition) => {	
	languageLog = [
		{language: 'python', message: 'print("Hello world!")'},
		{language: 'javascript', message: 'console.log("Hello world!")'},
		{language: 'java', message: 'System.out.print("Hello world!")'},
		{language: 'c++', message: 'cout << "Hello world!"'},
		{language: 'c', message: 'printf("Hello, World!")'},
		{language: 'php', message: 'echo "Hello world!"'}
	];

	
	if ($('#greetings').length > 0) {
		while (true) {
			let randomInt = getRandomInt(languageLog.length);

			while (previousPosition && previousPosition === randomInt) {
				console.log('same result');				
				randomInt = getRandomInt(languageLog.length);
			}
			previousPosition = randomInt;

			$('#greetings #text').text(languageLog[randomInt]['message']);
			$('#greetings #text').animate({
				'left': '0px',
			}, 350)

			await new Promise(r => setTimeout(r, 5000));
			$('#greetings #text').css({'left': '-30px'})
		}
	}
} 

function animateFromLeft() {
	
}

function getRandomInt(max) {
	return Math.floor(Math.random() * max);
}

function showArrowToTop() {
	// When the user scrolls down 450px from the top of the document, show the scroll-to-top-button
	if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450)
		document.getElementById("arrow-to-top").classList.add('active');
	else 
		document.getElementById("arrow-to-top").classList.remove('active');
	
	$(".arrowDown").css("opacity", 1 - $(window).scrollTop() / 5000);
}
// When the user clicks on the arrow button, scroll to the top of the document
function scrollToTop(event) {
	event.preventDefault();
	$('html, body').animate({
  		scrollTop: 0
	}, 900);
}