<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Sản phẩm / Sửa</h1>
        <div class="row">
            <div class="col-xl-12">
            <?= view('messages/message') ?>
                <div class="card easion-card">
                    <div class="card-header">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin sản phẩm </div>
                    </div>
                    <div class="card-body ">
                        <form action="admin/product/update" method="post">
                       

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tên sản phẩm</label>
                                    <input value="<?= $product['name'] ?>" name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group"><label for="input-choose-image"></label>
                                    <input type="hidden" name="current_image" value="<?= $product['images'] ?>">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Giá</label>
                                    <input value="<?= $product['price'] ?>" name="price" type="text" class="form-control" placeholder="Nhập giá bán" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description">Mô tả</label></br>
                                    <textarea name="description" id="description"><?= $product['description'] ?></textarea></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Danh mục</label>
                                    <input value="<?= $product['category'] ?>" name="category" type="text" class="form-control" placeholder="Nhập danh mục sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Số lượng</label>
                                    <input value="<?= $product['amount'] ?>" name="amount" type="text" class="form-control" placeholder="Nhập số lượng" required>
                                </div>
                                <div class="form-group">
                                <!-- <div class="custom-control custom-checkbox">
                                    <input name="change-product" type="checkbox" class="custom-control-input" id="change-product">
                                    <label class="custom-control-label" for="change-product">Thay đổi thông tin sản phẩm</label>
                                </div> -->
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button id="btn-reset-edit-product" type="reset" class="btn btn-secondary">Nhập lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>