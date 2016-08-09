<div class="modal fade" tabindex="-1" role="dialog" id="modal-upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Đăng tài liệu</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form-upload">
                    <div class="form-group">
                        <label for="name">Tên tài liệu</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Điền tên tài liệu">
                    </div>
                    <div class="form-group">
                        <label for="description">Miêu tả</label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Điền miêu tả tài liệu"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="subject">Môn học</label>
                        <select class="form-control" id="subject" name="subject">
                            <?php $subjects = \app\components\Util::getSubjects(); ?>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?php echo $subject->id ?>"><?php echo $subject->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Đính kèm file</label>
                        <input type="file" id="document" name="file">
                    </div>
                </form>
                <div class="progress progress-striped active" id="progress-upload" style="display: none">
                    <div class="progress-bar progress-bar-info" style="width: 80%;" id="progress-info"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btn-upload-doc">Đăng</button>
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->