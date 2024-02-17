<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Sản phẩm</h1>
    <div class="row">
        <div class="col-lg-12">
            <?= view('messages/messages'); ?>
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
                            <tr>
                                <td>id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>emai_address</td>
                                <td>storage</td>
                                <td>databases</td>
                                <td>domains</td>  
                                <td class="text-center">
                                    <a href="purchase-edit.html" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a data-url="" class="btn btn-danger btn-del-confirm"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>