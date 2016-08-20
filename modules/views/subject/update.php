<div class="modal fade" tabindex="-1" role="dialog" id="modal-admin-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cập nhật môn học</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-admin-add">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Điền tên môn học">
                    </div>
                    <div class="form-group">
                        <label for="description">Miêu tả</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Điền miêu tả "></textarea>
                    </div>
                </form>
                <div class="progress progress-striped active" id="progress-upload" style="display: none">
                    <div class="progress-bar progress-bar-info" style="width: 80%;" id="progress-info"></div>
                </div>
                <input type="hidden" id="url" value="/admin/subject/add" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btn-submit-admin">Cập nhật</button>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->