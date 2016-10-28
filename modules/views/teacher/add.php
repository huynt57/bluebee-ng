<div class="modal fade" tabindex="-1" role="dialog" id="modal-admin-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thêm giảng viên</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-admin-update" name="form-admin">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <select class="form-control" id="department" name="department">
                        <label for="department">Department</label>
                        <?php $departments = \app\components\Util::getDepartments(); ?>
                        <?php foreach ($departments as $department): ?>
                            <option value="<?php echo $department->id ?>"><?php echo $department->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Điền miêu tả "></textarea>
                    </div>
                    <div class="form-group">
                        <label for="research">Research</label>
                        <textarea type="text" class="form-control" id="research" name="research" placeholder="Điền miêu tả "></textarea>
                    </div>
                    <input type="hidden" name="<?php echo \Yii::$app->request->csrfParam ?>" value="<?php echo \Yii::$app->request->csrfToken?>" >
                </form>

                <input type="hidden" id="url-add" value="/admin/subject/add" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btn-submit-admin-add">Đăng</button>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->