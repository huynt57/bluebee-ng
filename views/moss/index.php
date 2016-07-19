<?php ?>
<div class="row">
    <div class="col-md-12">
        <h6>Bluebee sử dụng công cụ Moss để phát hiện tỉ lệ sao chép code giữa các file khác nhau. 
            Các bạn vui lòng upload các file cần kiểm tra lên nhé. Để hiểu hơn về Moss, các bạn vui lòng theo dõi 
            tại <a href="http://theory.stanford.edu/~aiken/moss/" target="_blank">đây</a></h6>
    </div>
</div>
<div class="row">

    <div class="col-md-7">

        <form role="form" id="form-upload-moss" action="upload" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="language">Chọn ngôn ngữ lập trình</label>
                <p class="help-block">Hệ thống hoạt động tốt nhất nếu bạn chọn chính xác ngôn ngữ lập trình
                    của file.</p>
                <select class="form-control" id="language" name="language">
                    <?php foreach ($languages as $key => $value): ?>
                        <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="file">Upload các file cần check</label>
                <input type="file" id="file" name="file[]" multiple>
            </div>
            <button class="btn btn-primary" type="submit" id="btn-moss">Gửi</button>
        </form>
        <div class="progress progress-striped active" id="progress-upload" style="display: none">
            <div class="progress-bar progress-bar-info" style="width: 80%;" id="progress-info"></div>
        </div>
    </div>
</div>