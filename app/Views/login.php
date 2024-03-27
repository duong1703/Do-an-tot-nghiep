<?php include 'templates/header.php'; ?>

<?php $validation = \Config\Services::validation() ?>
<section class="vh-100 mt-4" style="">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mb-4 ">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng nhập</p>
                                <?php if(session()->has("error")): {?>
                                    <div class="alert alert-danger p-1 text-center" role="alert">
                                        <?= session()->get("error") ?>
                                    </div>
                                <?php } endif;?>
                                <?php if(session()->has("success")): {?>
                                    <div class="alert alert-success p-1 text-center" role="alert">
                                        <?= session()->get("success") ?>
                                    </div>
                                <?php } endif;?>
                                <form class="mx-1 mx-md-4 mt-4" action="<?php echo base_url('/login'); ?>" method="post">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" value="<?= old('email') ?>" id="email" class="form-control" placeholder="Example@gmail.com" required/>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div class="form-outline flex-fill mb-0 mt-4">

                                            <label class="form-label" for="password">Mật khẩu</label>
                                            <input type="password" value="<?= old('password') ?>"
                                                   class="form-control is-invalid" id="form3Example4c"
                                                   class="form-control" placeholder="Your password" required/>
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
                                    <p>Chưa có tài khoản? <a href="views/register"> Đăng ký ngay</a></p>
                                </div>
                                <hr class="border border-primary">
                                <div style="text-align: center;">
                                    <a href="#" class="fb btn">
                                        <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                    </a>

                                    <a href="#" class="google btn">
                                        <i class="fa fa-google-plus fa-fw"></i> Login with Google
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img width="800" height="500"
                                     src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
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

