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

                <form class="mx-1 mx-md-4 mt-4" method="post">
                  <div class="d-flex flex-row align-items-center mb-4">
<!--                    <i><img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/new-post.png" alt="new-post"/></i>-->
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Email của bạn</label>
                      <input type="email"  value="<?php old('email');?>" id="form3Example3c" class="form-control" placeholder="Example@gmail.com"  />
                    </div>
                  </div>
                    <hr>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i>
<!--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">-->
<!--                        <path d="M 24 4 C 19.599415 4 16 7.599415 16 12 L 16 16 L 12.5 16 C 10.019 16 8 18.019 8 20.5 L 8 39.5 C 8 41.981 10.019 44 12.5 44 L 35.5 44 C 37.981 44 40 41.981 40 39.5 L 40 20.5 C 40 18.019 37.981 16 35.5 16 L 32 16 L 32 12 C 32 7.599415 28.400585 4 24 4 z M 24 7 C 26.779415 7 29 9.220585 29 12 L 29 16 L 19 16 L 19 12 C 19 9.220585 21.220585 7 24 7 z M 16 28 C 17.105 28 18 28.895 18 30 C 18 31.105 17.105 32 16 32 C 14.895 32 14 31.105 14 30 C 14 28.895 14.895 28 16 28 z M 24 28 C 25.105 28 26 28.895 26 30 C 26 31.105 25.105 32 24 32 C 22.895 32 22 31.105 22 30 C 22 28.895 22.895 28 24 28 z M 32 28 C 33.105 28 34 28.895 34 30 C 34 31.105 33.105 32 32 32 C 30.895 32 30 31.105 30 30 C 30 28.895 30.895 28 32 28 z"></path>-->
<!--                    </svg>-->
                    </i>
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

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button value="submit"  type="button" class="btn btn-primary btn-lg mt-2">Đăng ký</button>
                  </div>
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