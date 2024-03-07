<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Sản phẩm</h1>
    <div class="row">
        <div class="col-lg-12">
            <?= view('messages/message') ?>
            <div class="card easion-card">
                <div class="card-header">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách sản phẩm</div>
                </div>
                <div class="card-body ">
                    <table id="datatable" class="cell-border">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Mô tả sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($products) && !empty($products)) : ?>
                                <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?= $product['id'] ?></td>
                                        <td><?= $product['name'] ?></td>
                                        <td>
                                            <img src="uploads/<?php echo $product['images'];?>" height="60px" width="60px" alt="images">
                                        </td>
                                        <td><?= $product['price'] . "VND" ?></td>
                                        <td><?= $product['description'] ?></td>
                                        <td><?= $product['category'] ?></td>
                                        <td><?= $product['amount'] ?></td>
                                        <td class="text-center">
                                            <a href="admin/product/edit/<?= $product['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a data-url="<?= base_url() ?>admin/product/delete/<?= $product['id'] ?>" class="btn btn-danger btn-del-confirm">
                                                <i class="far fa-trash-alt"></i>
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