<?php include 'templates/header.php'; ?>


<section class="vh-100 mt-4" style="" >
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 mb-4 ">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center mb-4">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng ký</p>
                  <?php if(isset($validation)):?>
                      <div class="alert alert-warning">
                          <?= $validation->listErrors() ?>
                      </div>
                  <?php endif;?>
                <form class="mx-1 mx-md-4 mt-4" action="<?= base_url('register') ?>" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Email của bạn</label>
                      <input type="email"  value="<?php old('email');?>" id="form3Example3c" class="form-control" placeholder="Example@gmail.com"  />
                    </div>
                  </div>
                    <hr>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Mật khẩu</label>
                      <input type="password" value="<?php old('password');?>" id="form3Example4c" class="form-control" placeholder="Your password"  />
                    </div>
                  </div>

                  <!-- <div class="d-flex flex-row align-items-center mb-4">
                    <i><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/repeat.png" alt="repeat"/></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Nhập lại mật khẩu</label>
                    </div>
                  </div> -->
                    <button type="submit" class="btn btn-primary btn-block">Login</button>

                </form>

                <div class="text-center mt-4">
                  <p>Đã có tài khoản? <a href="views/login">Đăng nhập ngay</a></p>
                </div>
                  <hr>
                  <div style="text-align: center;">
                      <a href="#" class="fb btn">
                          <i class="fa fa-facebook fa-fw"></i> Register with Facebook
                      </a>

                      <a href="#" class="google btn">
                          <i class="fa fa-google-plus fa-fw"></i> Register with Google
                      </a>
                  </div>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
              <img width="800" height="500" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid " alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'templates/footer.php'; ?>