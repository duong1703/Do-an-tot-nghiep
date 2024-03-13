<!--stylesheet for modal-->
<form action="<?= base_url('user/delete') ?>" method="post">
    <div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteUser" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card-header py-2">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 400px;">
                                <h6 class="m-0 font-weight-bold text-primary">Xóa bài viết</h6>
                            </td>
                            <td style="width: auto; text-align: right;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
<!--                <div class="modal-body">-->
<!--                    <h4>Bạn có chắc chắn muốn xóa Người dùng?</h4>-->
<!--                    <div style="width: 100%; text-align: left; padding-left: 20px;">-->
<!--                        Tên người dùng: <input type="button" class="fullname_delete" style="color: chocolate; font-style: italic; border:none; background: none;" disabled>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="modal-footer">
                    <input type="hidden" name="user_id" class="user_id_delete">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
</form>