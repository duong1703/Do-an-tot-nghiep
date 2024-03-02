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
							<td class="ID">ID</td>
							<td class="images">Ảnh sản phẩm</td>
							<td class="description">Mô tả sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
				</table>
				<?= view('emptycart'); ?>
			</div>
		</div>
	</section> 
<?php include 'templates/footer.php'; ?>