<?php include 'templates/header.php'; ?>

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Đăng nhập vào tài khoản</h2>
					<form action="" method="post">
						<input type="email" placeholder="Email Address" />
						<input type="password" placeholder="Password" />
						<span>
							<input type="checkbox" class="checkbox">
							Giữ tôi đăng nhập
						</span>
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">Hoặc</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>Đăng ký thành viên mới!</h2>
					<form action="views/login" method="post">
						<input type="text" placeholder="Name" />
						<input type="email" placeholder="Email Address" />
						<input type="password" placeholder="Password" />
						<button type="submit" class="btn btn-default">Đăng ký</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->>

<?php include 'templates/footer.php'; ?>