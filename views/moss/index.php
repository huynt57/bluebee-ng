<?php ?>

<div class="row">
    <form role="form" id="form-upload" action="upload" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file">Upload các file cần check</label>
            <input type="file" id="file" name="file[]" multiple>
        </div>
        <button type="submit">Gửi</button>
    </form>
</div>