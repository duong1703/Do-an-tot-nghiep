<?php include 'templates/header.php'; ?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="id_product">ID</td>
							<td class="images">Ảnh sản phẩm</td>
                            <td class="name">Tên sản phẩm</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
				</table>
                <!-- Trong view giỏ hàng -->
                <?php if (session()->has('views/cart')) : ?>
                    <h1>Giỏ hàng của bạn</h1>
                    <ul>
                        <?php foreach (session()->get('views/cart') as $item) : ?>
                            <li>
                                <span><?= $item['id_product'] ?></span>
                                <span><?= $item['images'] ?></span>
                                <span><?= $item['name'] ?></span>
                                <span><?= $item['description'] ?></span>
                                <span><?= $item['price'] ?></span>
                                <span><?= $item['quantity'] ?></span>
                                <span><?= $item['total'] ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p><?= view('emptycart'); ?></p>
                <?php endif; ?>
			</div>
		</div>
	</section> 
<?php include 'templates/footer.php'; ?>