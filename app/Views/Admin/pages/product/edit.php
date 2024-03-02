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
                            <input name="id" value="<?= $product['id'] ?>" hidden>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tên sản phẩm</label>
                                    <input value="<?= old('name') ?>" name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group"><label for="input-choose-image">Ảnh sản phẩm</label>
                                        <input value="<?= old('images') ?>" name="images" type="file" accept="image/*" class="form-control-file" id="input-choose-image" required>
                                    </div>
                                    <div class="form-group">
                                        <img id="img-show" src="" class="img-fluid" alt="Hình đại diện." style="display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Giá</label>
                                    <input value="<?= old('price') ?>" name="price" type="text" class="form-control" placeholder="Nhập giá bán" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description">Mô tả</label></br>
                                    <textarea value="<?= old('description') ?>" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Danh mục</label>
                                    <input value="<?= old('category') ?>" name="category" type="text" class="form-control" placeholder="Nhập danh mục sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Số lượng</label>
                                    <input value="<?= old('amount') ?>" name="amount" type="text" class="form-control" placeholder="Nhập số lượng" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <button id="btn-reset-edit-user" type="reset" class="btn btn-secondary">Nhập lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>