$(document).ready(function () {
    $('.add-wishlist').click(function (e) {
        e.stopPropagation();
        $.ajax({
            type: 'POST',
            url: '/document/add-wishlist',
            data: {doc_id: '1'},
            success: function (response)
            {
                console.log(response);
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
            success: function ()
            {
                $("#form-upload")[0].reset();
                hideProgressBar();
                $('#modal-upload').modal('hide');
                $('#modal-success').modal('show');
            }
        });
    });

});


