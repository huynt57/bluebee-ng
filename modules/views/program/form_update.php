<form role="form" id="form-admin-update" name="form-admin">
    <div class="form-group">
        <label for="name">Semester</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data->semester; ?>" placeholder="Điền tên môn học">
    </div>
    <div class="form-group">
        <label for="subject">Subject</label>
        <select class="form-control" id="subject" name="subject">
            <?php $subjects = \app\components\Util::getSubjects(); ?>
            <?php foreach ($subjects as $subject): ?>
                <option <?php if ($subject->id == $data->subject):?>selected <?php endif ?> value="<?php echo $subject->id ?>"><?php echo $subject->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <select class="form-control" id="department" name="department">
        <label for="department">Department</label>
        <?php $departments = \app\components\Util::getDepartments(); ?>
        <?php foreach ($departments as $department): ?>
            <option <?php if ($department->id == $data->department_id):?>selected <?php endif ?> value="<?php echo $department->id ?>"><?php echo $department->name ?></option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name="<?php echo \Yii::$app->request->csrfParam ?>" value="<?php echo \Yii::$app->request->csrfToken?>" >
    <input type="hidden" id="url-update" value="/admin/program/update"/>
    <input type="hidden" name="id" value="<?php echo $data->id ?>">
</form>
