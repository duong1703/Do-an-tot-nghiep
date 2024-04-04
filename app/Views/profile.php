<?php include 'templates/header.php'; ?>
    <style>
        /* Định dạng background xám */
        .gray-background {
            background-color: #f8f9fa; /* Màu xám nhạt */
            padding-left: 15px; /* Thụt lề bên trái */
            padding-right: 15px; /* Thụt lề bên phải */
            margin-bottom: 50px;
        }
    </style>
    <div class="container gray-background mb-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="info">
                    <h4>Thông tin tài khoản</h4>
                        <label>ID Khách hàng: </label>
                        <p><?= session()->get("customer_id") ?></p>
                        <hr>
                        <label>Tên khách hàng: </label>
                        <p><?= session()->get("customer_name") ?></p>
                        <hr>
                        <label>Email khách hàng: </label>
                        <p><?= session()->get("customer_email") ?></p>
                        <hr>
                        <label>Ngày tạo: </label>
                        <p><?= session()->get("created_at") ?></p>
                        <hr>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="orderinfo">
                    <h4>Thông tin lịch sử mua hàng</h4>
                </div>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu" >
                        <th class="id_product">ID</th>
                        <th class="images">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá</th>
                        <th class="quantity">Số lượng</th>
                        <th class="subtotal">Tổng</th>
                        <th class="status">Trạng thái đơn hàng</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <?php include 'templates/footer.php'; ?>