<div class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Sản phẩm / Thêm mới</h1>
        <div class="row">
            <div class="col-xl-12">
                <?php if (!empty($messageCode) && !empty($message)) : ?>
                    <div class="alert alert-<?php echo $messageCode; ?>">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <div class="card easion-card">
                    <div class="card-header">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin sản phẩm </div>
                    </div>
                    <div class="card-body ">
                        <form action="admin/product/create" method="post">
                            <input name="id" hidden>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tên sản phẩm</label>
                                    <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="input-choose-image">Ảnh sản phẩm</label>
                                        <input name="images" type="file" accept="image/*" class="form-control-file" id="input-choose-image" required>
                                    </div>
                                    <div class="form-group">
                                        <img id="img-show" src="" class="img-fluid" alt="Hình đại diện." style="display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Giá</label>
                                    <input name="price" type="text" class="form-control" placeholder="Nhập giá bán" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mô tả sản phẩm</label>
                                    <input name="description" type="text" class="form-control" placeholder="Nhập mô tả sản phẩm" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Danh mục</label>
                                    <input name="category" type="text" class="form-control" placeholder="Nhập danh mục sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Số lượng</label>
                                    <input name="amount" type="text" class="form-control" placeholder="Nhập số lượng" required>
                                </div>
                            </div>
                            <!-- <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Thời gian hỗ trợ</label>
                                    <input name="support" type="text" class="form-control" placeholder="Nhập thông tin hỗ trợ" required>
                                </div>
                            </div> -->
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-secondary">Nhập lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>