<form role="form" id="form-admin-update" name="form-admin">
    <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name; ?>" placeholder="Điền tên môn học">
    </div>
    <div class="form-group">
        <label for="description">Miêu tả</label>
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Điền miêu tả "><?php echo strip_tags($data->description); ?></textarea>
    </div>
    <input type="hidden" id="url-update" value="/admin/subject/update"/>
    <input type="hidden" name="<?php echo \Yii::$app->request->csrfParam ?>" value="<?php echo \Yii::$app->request->csrfToken?>" >
    <input type="hidden" name="id" value="<?php echo $data->id ?>">
</form>
