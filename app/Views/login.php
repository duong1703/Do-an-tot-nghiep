<?php include 'templates/header.php'; ?>

<?php $validation = \Config\Services::validation() ?>
<section class="vh-100 mt-4">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mb-4">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <?php if(session()->has("customer_name")): ?>
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Xin chào, <?= session()->get("customer_name") ?></p>
                                <?php else: ?>
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Chào mừng đến với trang web của chúng tôi!</p>
                                <?php endif; ?>
                                <?php if(session()->has("error")): ?>
                                    <div class="alert alert-danger p-1 text-center" role="alert">
                                        <?= session()->get("error") ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(session()->has("success")): ?>
                                    <div class="alert alert-success p-1 text-center" role="alert">
                                        <?= session()->get("success") ?>
                                    </div>
                                <?php endif; ?>
                                <form class="mx-1 mx-md-4 mt-4" action="/login" method="post">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <?= \Config\Services::validation()->listErrors() ?>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="customer_email" value="<?= old('customer_email') ?>" id="email" class="form-control" placeholder="Example@gmail.com" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <input type="password" name="customer_password" class="form-control" id="password" placeholder="Your password" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                </form>
                                <div class="text-center mt-4">
                                    <p>Chưa có tài khoản? <a href="<?php echo base_url('views/register'); ?>">Đăng ký ngay</a></p>
                                </div>
                                <hr class="border border-primary">
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary"><i class="fa fa-facebook fa-fw"></i> Đăng nhập bằng Facebook</a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-google fa-fw"></i> Đăng nhập bằng Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'templates/footer.php'; ?>
