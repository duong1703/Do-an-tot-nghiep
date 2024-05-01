<?php include 'templates/header.php'; ?>
<?php
$total = 0;
foreach ($cartItems as $productId => $cartItem) {
    // $quantity = $cartItem['quantity'];
    // $price = $cartItem['product']['price'];
    $total += $cartItem['total'];
 
    // $subtotal = array($quantity * $price) ;
   
}
?>

<style>
.quantity-input {
    width: 70px;
    /* Điều chỉnh chiều rộng của input */
    text-align: center;
    /* Căn giữa nội dung trong input */
    border-radius: 5px;
    /* Bo tròn viền input */
}

/* Điều chỉnh kiểu dáng cho nút tăng giảm */
.input-group .btn {
    width: 30px;
    /* Điều chỉnh chiều rộng của nút */
    height: auto;
    /* Chiều cao tự động */
    padding: 5px 10px;
    /* Điều chỉnh khoảng cách giữa các nút */
    font-size: 14px;
    /* Điều chỉnh kích thước chữ */
    border-radius: 5px;
    /* Bo tròn viền nút */
}

/* Điều chỉnh kiểu dáng của nút tăng */
.input-group .btn-plus {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}

/* Điều chỉnh kiểu dáng của nút giảm */
.input-group .btn-minus {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

/* Ẩn nút tăng giảm */
.input-group .btn-number {
    display: none;
}
</style>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <button style=" font-size:15px; background: orange; margin-bottom: 20px; border-radius: 50px" id="clearCartBtn" class="btn btn-danger">Xóa giỏ hàng</button>
        <a style=" font-size:20px; background: orange; margin-bottom: 20px; border-radius: 50px" href="views/checkout"
            class="btn btn-warning rounded-4" name="">Đặt hàng</a>
        <a style="font-size:20px; background: orange; margin-bottom: 20px; border-radius: 50px" href="views/product"
            class="btn btn-warning rounded-4">Quay lại</a>
        <div class="table-responsive cart_info" style="font-size:20px">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="id_product">ID</td>
                        <td class="image">Ảnh</td>
                        <td class="name">Tên sản phẩm</td>
                        <td class="price">Đơn giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="subtotal">Thành tiền</td>
                        <td class="action">Xóa</td>
                    </tr>
                </thead>
                <tbody>
                    <form method="POST" action="remove-from-cart" id="remove-from-cart">
                        <?php if (!empty($cartItems)): ?>
                        <?php foreach ($cartItems as $cartItem): ?>
                        <tr>
                            <td><?= $cartItem['product']['id_product'] ?></td>
                            <td>
                                <img src="uploads/<?= $cartItem['product']['images'] ?>" alt="" height="60px"
                                    width="60px">
                            </td>
                            <td><?= $cartItem['product']['name'] ?></td>
                            <td><?= $cartItem['product']['price'] ?></td>
                            <td>
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                                    <input type="number" class="form-control quantity-input text-center" value="1" min="1"
                                        style="width: 80px;">
                                    <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                                    <input type="hidden" class="product-price"
                                        value="<?= $cartItem['product']['price'] ?>">
                                </div>


                            </td>

                            <td class="subtotal" id="subtotal"><?= $cartItem['product']['price'] ?></td>
                            <td class="cart_delete" style="padding-top:30px">
                                <button class="btn btn-danger delete-product-btn" data-product-id="<?= $cartItem['product']['id_product'] ?>">Xóa<i class="far fa-trash-alt"></i></button>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </form>
                </tbody>
            </table>
            <hr>
            <h3 id="totalPrice">Tổng tiền: <?php echo $total; ?> </h3>
        </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const minusButtons = document.querySelectorAll('.minus-btn');
    const plusButtons = document.querySelectorAll('.plus-btn');
    const inputFields = document.querySelectorAll('.quantity-input');
    const priceFields = document.querySelectorAll('.product-price');
    const totalPriceField = document.getElementById('totalPrice');



    function updateSubtotal(inputField, priceField) {
        const quantity = parseInt(inputField.value) || 0;
        const price = parseFloat(priceField.value) || 0;
        return quantity * price;
    }

    function updateTotalPrice() {
        let totalPrice = 0;
        inputFields.forEach((inputField, index) => {
            const subtotal = updateSubtotal(inputField, priceFields[index]);
            totalPrice += subtotal;
        });
        totalPriceField.textContent = 'Tổng tiền: ' + totalPrice.toFixed(2);
    }

    minusButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const inputField = inputFields[index];
            let value = parseInt(inputField.value, 10);
            if (value > 1) {
                inputField.value = value - 1;
                updateTotalPrice();
            }
        });
    });

    plusButtons.forEach((button, index) => {
        button.addEventListener('click', function() {
            const inputField = inputFields[index];
            inputField.value = parseInt(inputField.value, 10) + 1;
            updateTotalPrice();
        });
    });

    inputFields.forEach((inputField, index) => {
        inputField.addEventListener('input', function() {
            updateTotalPrice();
        });
    });
});

function calculateTotalPrice() {
    let totalPrice = 0;
    document.querySelectorAll('.subtotal').forEach(function(subtotalElement) {
        totalPrice += parseFloat(subtotalElement.textContent.replace(/[^0-9.-]+/g, '')) || 0;
    });
    return totalPrice;
}


document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const totalPriceElement = document.getElementById('totalPrice');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const row = button.closest('tr'); // Tìm hàng chứa nút xóa
            const productId = row.dataset.productId; // Lấy ID sản phẩm từ thuộc tính dữ liệu của hàng
            // Thực hiện xử lý xóa sản phẩm ở đây, có thể thông qua AJAX hoặc form submit
            row.remove(); // Xóa hàng sản phẩm khỏi DOM
            const newTotalPrice = calculateTotalPrice(); // Tính toán tổng giá trị mới
            totalPriceElement.textContent = 'Tổng tiền: ' + newTotalPrice.toFixed(2); // Cập nhật tổng giá trị trong DOM
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const quantityInputs = document.querySelectorAll('.quantity-input');

    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            const row = input.closest('tr'); // Tìm hàng chứa input số lượng
            const price = parseFloat(row.querySelector('.product-price').value); // Lấy giá sản phẩm từ input ẩn
            const quantity = parseInt(input.value); // Lấy số lượng mới từ input
            const subtotal = price * quantity; // Tính toán giá trị subtotal
            row.querySelector('.subtotal').textContent = subtotal.toFixed(2); // Cập nhật giá trị subtotal vào thẻ td
            updateTotalPrice(); // Cập nhật tổng giá tiền
        });
    });

    function updateTotalPrice() {
        let totalPrice = 0;
        document.querySelectorAll('.subtotal').forEach(function(subtotalElement) {
            totalPrice += parseFloat(subtotalElement.textContent);
        });
        document.getElementById('totalPrice').textContent = 'Tổng tiền: ' + totalPrice.toFixed(2);
    }
});

document.getElementById('clearCartBtn').addEventListener('click', function() {
    // Xác nhận trước khi xóa giỏ hàng
    if (confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng không?')) {
        // Thực hiện xóa toàn bộ giỏ hàng
        clearCart();
    }
});

$('.delete-product-btn').on('click', function() {
    // Lấy ID sản phẩm từ thuộc tính data hoặc bất kỳ cách nào khác
    var productId = $(this).data('product-id');

    // Gửi yêu cầu AJAX để xóa sản phẩm
    $.ajax({
        url: '/remove-from-cart', // Đường dẫn đến phương thức controller
        type: 'POST',
        data: { product_id: productId }, // Dữ liệu gửi đi (ID sản phẩm cần xóa)
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Xóa thành công, thực hiện các thay đổi cần thiết trên giao diện người dùng
                alert('Sản phẩm đã được xóa khỏi giỏ hàng.');
                // Ví dụ: cập nhật số lượng sản phẩm trong giỏ hàng
                $('#cart-item-count').text(response.cartItemCount);
            } else {
                // Xóa không thành công, xử lý lỗi nếu cần
                alert('Xóa sản phẩm không thành công.');
            }
        },
        error: function() {
            // Xử lý lỗi AJAX nếu có
            alert('Đã xảy ra lỗi khi gửi yêu cầu.');
        }
    });
});

</script>

<?php include 'templates/footer.php'; ?>