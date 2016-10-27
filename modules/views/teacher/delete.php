<div class="modal fade" tabindex="-1" role="dialog" id="modal-admin-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Xóa giảng viên</h4>
            </div>
            <div class="modal-body" id="modal-body-delete">
                Bạn có chắc chắn muốn xóa giảng viên này ?
                <input type="hidden" id="url-delete" value="/admin/teacher/delete"/>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btn-submit-admin-delete">Xóa</button>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->