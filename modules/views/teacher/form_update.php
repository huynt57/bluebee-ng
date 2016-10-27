<form role="form" id="form-admin-update" name="form-admin">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->name; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $data->email; ?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $data->phone; ?>">
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website" value="<?php echo $data->website; ?>">
    </div>
    <select class="form-control" id="department" name="department">
        <label for="department">Department</label>
        <?php $departments = \app\components\Util::getDepartments(); ?>
        <?php foreach ($departments as $department): ?>
            <option <?php if ($department->id == $data->department):?>selected <?php endif ?> value="<?php echo $department->id ?>"><?php echo $department->name ?></option>
        <?php endforeach; ?>
    </select>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $data->address; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Điền miêu tả "><?php echo strip_tags($data->description); ?></textarea>
    </div>
    <div class="form-group">
        <label for="research">Research</label>
        <textarea type="text" class="form-control" id="research" name="research" placeholder="Điền miêu tả "><?php echo strip_tags($data->research); ?></textarea>
    </div>
    <input type="hidden" name="<?php echo \Yii::$app->request->csrfParam ?>" value="<?php echo \Yii::$app->request->csrfToken?>" >
    <input type="hidden" id="url-update" value="/admin/teacher/update"/>
    <input type="hidden" name="id" value="<?php echo $data->id ?>">
</form>
