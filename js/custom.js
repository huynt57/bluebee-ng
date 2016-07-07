$(document).ready(function() {
    $('.add-wishlist').click(function() {
        $.ajax({
            type: 'POST',
            url: '/document/add-wishlist',
            data: {doc_id: '1'},
            success: function(response)
            {
                console.log(response);
            }
        });
    });
    
    
    
}) 