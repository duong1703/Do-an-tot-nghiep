<form action="<?= base_url('admin/blog/delete') ?>" method="post">
    <div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteUser" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa bài viết này?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_blogs" class="blog_id_delete">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                </div>
            </div>
        </div>
    </div>
</form>
