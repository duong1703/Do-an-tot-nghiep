<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container mt-4">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
						<img src="/assets/images/logo.png" alt="" width="180" height="90" class="img-responsive" /></a>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="address">
							<img src="/assets/user/images/home/map.png" alt="" class="img-fluid" />
							<p>235 Hoàng Quốc việt, Hà Nội</p>
						</div>
					</div>

                    <div class="col-sm-3">
                        <div class="flex-container">
                            <a href="#">
                                <img style="margin-top: 50px; margin-left 50px: " src="/assets/images/icon.png" class="img-responsive" alt="Company Logo" height="90px" width="250px">
                            </a>
                        </div>

                    </div>

				</div>
			</div>
		</div>


		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Trợ giúp trực tuyến</a></li>
								<li><a href="#">Liên hệ chúng tôi</a></li>
								<li><a href="#">Đặt hàng</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Workshop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Máy tính Laptop</a></li>
								<li><a href="#">Máy tính Case</a></li>
								<li><a href="#">Card đồ họa</a></li>
								<li><a href="#">Chuột</a></li>
								<li><a href="#">Bàn phím</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách sử dụng</a></li>
								<li><a href="#">Chính sách ưu đãi</a></li>
                                <li><a href="#">Chính sách mua hàng</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Về cửa hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Đăng ký nhận tin</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Email">
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Đăng ký nhận tin để nhận những thông tin mới nhất về chúng tôi...</p>
                            </form>
                        </div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2024 The Computer Shop Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="">The Computer Shop</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->
	<script src="assets/user/js/jquery.js"></script>
	<script src="assets/user/js/bootstrap.min.js"></script>
	<script src="assets/user/js/jquery.scrollUp.min.js"></script>
	<script src="assets/user/js/price-range.js"></script>
	<script src="assets/user/js/jquery.prettyPhoto.js"></script>
	<script src="assets/user/js/main.js"></script>
	<script src="assets/admin/js/event.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>

<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("myactive");
    var btns = header.getElementsByClassName("li");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

    //Rating
    const stars = document.querySelectorAll('.star');
    const submitBtn = document.getElementById('submitBtn');

    let rating = 0;

    stars.forEach(star => {
        star.addEventListener('click', () => {
            rating = parseInt(star.getAttribute('data-value'));
            updateStars();
        });
    });

    function updateStars() {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });

        if (rating > 0) {
            submitBtn.style.display = 'block';
        } else {
            submitBtn.style.display = 'none';
        }
    }

    //Slider
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'vertical',
        loop: true,

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
    });
</script>

</body>
</body>

</html>