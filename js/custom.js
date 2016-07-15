$(document).ready(function () {
    $('.add-wishlist').click(function (e) {
        e.preventDefault();
        doc_id = $(this).attr('data-id');
        e.stopPropagation();
        $.ajax({
            type: 'POST',
            url: '/document/add-wishlist',
            data: {doc_id: doc_id},
            success: function (response)
            {
                $.toast({
                    heading: 'Thành công',
                    text: 'Bạn đã đánh dấu tài liệu này thành công !',
                    showHideTransition: 'slide',
                    icon: 'success'
                });
            },
            error: function (response)
            {
                $.toast({
                    heading: 'Lỗi !',
                    text: 'Có lỗi xảy ra, bạn vui lòng thử lại sau nhé :(',
                    showHideTransition: 'slide',
                    icon: 'success'
                });
            }
        });
    });

    $('#progress-upload').hide();
    function hideProgressBar()
    {
        $('#progress-upload').hide();
        $('#progress-info').css('width', 0 + '%');
    }

    $('#btn-upload-doc').click(function (e) {
        e.stopPropagation();
        var form = $('#form-upload');
        var data = new FormData(form[0]);
        $.ajax({
            beforeSend: function (xhr) {
                hideProgressBar();
            },
            type: 'POST',
            url: '/document/upload',
            data: data,
            xhr: function ()
            {
                hideProgressBar();
                var xhr = new window.XMLHttpRequest();
                //Upload progress
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        percentComplete = Math.round(percentComplete * 100) / 100;
                        //Do something with upload progress
                        //                                    console.log(percentComplete);
                        if (percentComplete <= 100) {
                            $('#progress-upload').show();
                            $('#progress-info').css('width', percentComplete + '%');

                        } else {
                            hideProgressBar();
                        }
                    }
                }, false);
                hideProgressBar();
                return xhr;
            },
            contentType: false,
            cache: false,
            processData: false,
            error: function ()
            {
                $('#modal-error').modal('show');
            },
            dataType: 'json',
            success: function (response)
            {
                $("#form-upload")[0].reset();
                hideProgressBar();
                $('#modal-upload').modal('hide');
                $('#message-success').html('Tài liệu của bạn đã được đăng thành công. Bạn có thể kiểm tra tại <a href="/document/item/' + response.data + '">đây</a>');
                $('#modal-success').modal('show');
            }
        });
    });

});


