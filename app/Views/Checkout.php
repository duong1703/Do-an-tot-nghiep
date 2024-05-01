<?php include 'templates/header.php'; ?>

<section>
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Điền thông tin thanh toán:</h2>

                    <form onsubmit="return confirm('Xác nhận đặt hàng?')" method="POST"
                        action="<?php echo base_url("online_checkout") ?>">
                        <label>Họ và Tên:</label>
                        <input type="text" name="name" placeholder="Họ và Tên" />

                        <label>Địa chỉ giao hàng:</label>
                        <input type="text" name="address" placeholder="Địa chỉ giao hàng" />

                        <label>Số điện thoại:</label>
                        <input type="text" name="phone" placeholder="Số điện thoại" />

                        <label>Email:</label>
                        <input type="email" name="email" placeholder="Email" />
                      
                    <button type="submit" name="redirect" class="btn btn-success">Thanh toán VNPAY</button>
                



                        <!-- <button type="submit" class="btn btn-default">Xác nhận</button> -->
                    </form>

                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->

<?php include 'templates/footer.php'; ?>