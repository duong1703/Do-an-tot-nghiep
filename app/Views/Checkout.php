<?php include 'templates/header.php'; ?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Thanh toán</li>
            </ol>
        </div>

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Thông tin thanh toán</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery"
                                  rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-payment">
            <h2>Kiểm tra lại hàng và tiến hành thanh toán</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="id_product">ID</td>
                    <td class="images">Ảnh sản phẩm</td>
                    <td class="name">Tên sản phẩm</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="subtotal">Tổng</td>
                </tr>
                </thead>

            </table>
        </div>
        <div class="payment-options" style="padding-right: 800px">
            <select name="" id="" >
                <option value="">Lựa chọn phương thức thanh toán</option>
                <option value="">Thanh toán COD</option>
                <option value="">Thanh toán VNPAY</option>
                <option value="">Thanh toán chuyển khoản</option>
            </select>
            <button >Thanh toán</button>
        </div>

    </div>
</section> <!--/#cart_items-->
<?php include 'templates/footer.php'; ?>
