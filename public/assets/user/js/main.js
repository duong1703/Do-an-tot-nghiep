/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

/* date */
function updateDate() {
    var now = new Date();
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    var formattedDate = now.toLocaleDateString('en-US', options);

    document.getElementById('realtime-date').innerHTML = formattedDate;
}

// Gọi hàm updateDate() mỗi giây để cập nhật ngày
setInterval(updateDate, 1000);

/* date */
function updateTime() {
    var now = new Date();
    var time = now.toLocaleTimeString();

    document.getElementById('realtime-time').innerHTML = time;
}

// Gọi hàm updateTime() mỗi giây để cập nhật thời gian
setInterval(updateTime, 1000);


//rating
const stars = document.querySelectorAll('.star');
const ratingValue = document.getElementById('rating-value');

let rating = 0;

stars.forEach((star, index) => {
	star.addEventListener('click', () => {
		rating = index + 1;
		updateRating();
	});

	star.addEventListener('mouseover', () => {
		resetRating();
		for (let i = 0; i <= index; i++) {
			stars[i].classList.add('active');
		}
	});

	star.addEventListener('mouseout', () => {
		resetRating();
		for (let i = 0; i < rating; i++) {
			stars[i].classList.add('active');
		}
	});
});

function resetRating() {
	stars.forEach(star => {
		star.classList.remove('active');
	});
}

function updateRating() {
	ratingValue.textContent = rating + ' / 5';
}