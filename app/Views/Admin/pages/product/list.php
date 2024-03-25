

<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Sản phẩm</h1>
    <script src="public/vendor/toastr/build/toastr.min.js"></script>
    <div class="row">
        <div class="col-lg-12">
            <?= view('messages/message') ?>
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="easion-card-title">Danh sách sản phẩm</div>
                        </div>
                        <div class="col-md-6" style="left: 790px">
                            <a href="<?= base_url('admin/product/add') ?>" class="btn btn-primary border border-danger rounded-pill"><i class="fas fa-plus"></i> Thêm mới</a>
                        </div>
                    </div>

                </div>
                <div class="card-body ">
                    <table id="datatable" class="cell-border stripe">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Mô tả sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col" class="text-center">Trạng thái sản phẩm nổi bật</th>
                                <th scope="col" style="width: 100px">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($products) && !empty($products)) : ?>
                                <?php foreach ($products as $index => $product) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $product['name'] ?></td>
                                        <td>
                                        <img src="uploads/<?php echo $product['images']; ?>" alt="" height="60px" width="60px">
                                        </td>
                                        <td><?= $product['price'] . "VND" ?></td>
                                        <td><?= $product['description'] ?></td>
                                        <td><?= $product['category'] ?></td>
                                        <td><?= $product['amount'] ?></td>
                                        <td class="text-center"><?= $product['status_product'] ?></td>
                                        <td class="text-center">
                                            <a href="admin/product/edit/<?= $product['id_product'] ?>" class="btn btn-primary btn-sm ___js-edit-product"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm ___js-delete-product" data-id="<?= @$product['id_product'];?>"><i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?= $this->include("Modals/Product/delete") ?>
<script>
    $('.___js-delete-product').on('click',function(){
        // Lấy dữ liệu từ nút xóa
        const id = $(this).data('id');
        console.log(id);
        // Đặt dữ liệu vào Form xóa
        $('.product_id_delete').val(id);
        // Gọi Modal xóa
        $('#confirmDeleteProduct').modal('show');
    });

    $('#datatable').DataTable({
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var title = column.footer().textContent;

                    // Create input element and add event listener
                    $('<input type="text" placeholder="Search ' + title + '" />')
                        .appendTo($(column.footer()).empty())
                        .on('keyup change clear', function () {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                });
        }
    });
</script>